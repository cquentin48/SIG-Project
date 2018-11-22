<?php
	importData();
	function importData(){
		$database = initDatabase();
		
		$returnedData = executeQuery("SELECT * FROM `geo_point`", $database);
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
		
		$returnedData = executeQuery("SELECT * FROM `geo_arc`", $database);
		$sigData = array();
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
		echo "<pre>";
			print_r($sigData);
		echo "</pre>";
	}
	
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

function executeQuery($sqlQuery, $database){
	$result = $database->query($sqlQuery);
	return $result->fetchAll(PDO::FETCH_ASSOC);
}
?> 