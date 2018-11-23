<?php

	/**
	* Import Data from mysqlDatabase
	* @return data from sql Database
	*/
	function importData(){
		$database = initDatabase();
		
		$returnedData = executeQuery("Select *
									from geo_point
									WHERE geo_point.GEO_POI_ID IN(
										SELECT geo_arc.GEO_ARC_DEB
										from geo_arc)
										or geo_point.GEO_POI_ID IN(
											SELECT geo_arc.GEO_ARC_FIN
											from geo_arc)
									order by GEO_POI_ID ASC", $database);
		$sigPointDataArray = array();
		$sigArcDataArray = array();

		foreach($returnedData as $aResultData){
			$sigDataReturnedArray = array();
			$sigDataReturnedArray['Beginning'] = $aResultData['GEO_ARC_DEB'];
			$sigDataReturnedArray['Ending'] = $aResultData['GEO_ARC_FIN'];
			$sigDataReturnedArray['Time'] = $aResultData['GEO_ARC_TEMPS'];
			$sigDataReturnedArray['Distance'] = $aResultData['GEO_ARC_DISTANCE'];
			$sigDataReturnedArray['Sens'] = $aResultData['GEO_ARC_SENS'];
			$sigArcDataArray[$aResultData['GEO_ARC_ID']] = $sigDataReturnedArray;
		}
		$sigData['arcs'] = $sigArcDataArray;
		
		$returnedData = executeQuery("SELECT *
									  FROM `geo_point`
									  ORDER BY `GEO_POI_ID`", $database);
		$sigPointDataArray = array();
		foreach($returnedData as $aResultData){
			$sigDataReturnedArray = array();
			$sigDataReturnedArray['Nom'] = $aResultData['GEO_POI_LATITUDE'];
			$sigDataReturnedArray['Latitude'] = $aResultData['GEO_POI_LATITUDE'];
			$sigDataReturnedArray['Longitude'] = $aResultData['GEO_POI_LATITUDE'];
			$sigDataReturnedArray['Partition'] = $aResultData['GEO_POI_PARTITION'];
			$sigPointDataArray[$aResultData['GEO_POI_ID']] = $sigDataReturnedArray;
		}
		$sigData['points'] = $sigPointDataArray;
		
		return $sigData;
	}
	
	/**
	* Database initialisation
	@return database initialised
	*/
	function initDatabase(){
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "gsi";
		try{
			$bdd = new PDO('mysql:host='.$servername.';dbname='.$dbname.';charset=utf8', $username, $password);
			return $bdd;	
		}catch(Exception $e){
			die("Erreur :".$e->getMessage());
			return null;
		}
	}

	/**
	* Execute query and return fetched data
	* @return fetchedData
	*/
	function executeQuery($sqlQuery, $database){
		$result = $database->query($sqlQuery);
		return $result->fetchAll(PDO::FETCH_ASSOC);
	}

	/**
	*	Convert deg coordinates to Lambert Coordinates
	*/
	function convertDegToLambert($coordinatesArray){
		$n = 0.7289686274;
		$C = 11745793.39;
		$e = 0.08248325676;
		$Xs = 600000;
		$Ys = 8199695.768;

		  

		$gamma0 = (3600*2)+(60*20)+14.025;
		$gamma0 = $gamma0/(180*3600)*pi;

		echo "gamma0 : ".$gamma0;
		$lat = $lat/(180*3600)*pi();
		$lon = lon/(180*3600)*pi();
		echo "Latitude : ".$lat;
		echo "Longitude :".$lon;

		$L = 0.5*log((1+sin($lat))/(1-sin($lat)))-e/2*log((1+e*sin($lat))/(1-e*sin($lat)));
		$R = C*exp(-1*$n*$L);
		echo "L : ".$L;
		echo "R : ".$R;
		
		$gamma = $n*($lon-$gamma0);

		echo "Gamma : ".$Gamma;
		
		$Lx = Xs+(R*sin($gamma));
		$Ly = Ys-(R*cos($gamma));
		echo "Lx : ".$Lx;
		echo "Ly : ".$Lx;
	}

	/**
	* Generate a KML File in return from an array in input
	* @return kmlOutput le tableau pour le fichier kml
	* @param data le tableau des points
	*/
	function generateKMLFile($data){
		$kml = array();
		array_push($km,'<?xml version="1.0" encoding="UTF-8"?>');
		array_push($km,'<kml xmlns="http://earth.google.com/kml/2.1">');
		array_push($km, '<Document>');
		array_push($km, '<Style id="restaurantStyle">');
		array_push($km, '<IconStyle id="restuarantIcon">');
		array_push($km, '<Icon>');
		array_push($km, '<href>http://maps.google.com/mapfiles/kml/pal2/icon63.png</href>');
		array_push($km, '</Icon>');
		array_push($km, '</IconStyle>');
		array_push($km, '</Style>');
		array_push($km, '<Style id="barStyle">');
		array_push($km, '<IconStyle id="barIcon">');
		array_push($km, '<Icon>');
		array_push($km, '<href>http://maps.google.com/mapfiles/kml/pal2/icon27.png</href>');
		array_push($km, '</Icon>');
		array_push($km, '</IconStyle>');
		array_push($km, '</Style>');
		
		foreach($data as $pointKey => $aPoint) 
		{
			array_push($km, '<Placemark id="placemark' . removeSpaces($aPoint['Nom']) . '">');
			array_push($km, '<name>' . htmlentities($aPoint['Nom']) . '</name>');
			array_push($km, '<description>Arrêt de bus n°'.$pointKey . "|" . htmlentities($aPoint['Nom']) . '</description>');
			array_push($km, '<styleUrl>#restaurantStyle</styleUrl>');
			array_push($km, '<Point>');
			array_push($km, '<coordinates>' . $aPoint['Longitude'] . ','  . $aPoint['Latitude'] . '</coordinates>');
			array_push($km, '</Point>');
			array_push($km, '</Placemark>');
		} 
		
		array_push($km, '</Document>');
		array_push($km, '</kml>');
		$kmlOutput = join("\n", $kml);
		
		echo $kmlOutput;
	}
	
	function removeSpaces($inputText){
		return preg_replace('/\s+/', ' ',$inputText);
	}
	
	$sigData = importData();
	generateKMLFile($sigData['points']);
?> 