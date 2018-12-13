<?php
	require_once("dijikstra.php");
	$DEFAULT_FILE_PATH = "../KMLOutput/kmlFile.kml";
	/**
	* Import Data from mysqlDatabase
	* @return data from sql Database
	*/
	
	function importData($graph){
		$database = initDatabase();
		
		$returnedData = executeQuery("Select *
									from geo_arc", $database);
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

			$graph->addedge($sigDataReturnedArray['Beginning'], 
			$sigDataReturnedArray['Ending'], 
			$sigDataReturnedArray['Distance']);
		}
		$sigData['arcs'] = $sigArcDataArray;
		
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
		foreach($returnedData as $aResultData){
			$sigDataReturnedArray = array();
			$sigDataReturnedArray['Nom'] = $aResultData['GEO_POI_NOM'];
			$sigDataReturnedArray['Latitude'] = $aResultData['GEO_POI_LATITUDE'];
			$sigDataReturnedArray['Longitude'] = $aResultData['GEO_POI_LONGITUDE'];
			$sigDataReturnedArray['busLinesId'] = $aResultData['GEO_POI_PARTITION'];
			$sigPointDataArray[$aResultData['GEO_POI_ID']] = $sigDataReturnedArray;
		}
		$sigData['points'] = $sigPointDataArray;
		
		return $sigData;
	}
	
	function djikestraAlgorithm(){
		
	}
	
	function convertDegToLambert($degArray){
		$n = 0.7289686274;
		$C = 11745793.39;
		$e = 0.08248325676;
		$Xs = 600000;
		$Ys = 8199695.768;

		  

		$gamma0 = (3600*2)+(60*20)+14.025;
		$gamma0 = $gamma0/(180*3600)*pi();

		echo  "gamma0 : ".$gamma0."<br/>";
		$lat = $degArray['Latitude']/(180*3600)*pi();
		$lon = $degArray['Longitude']/(180*3600)*pi();
		echo "Lat : ".$lat." Lon :".$lon."<br/>";

		$L = 0.5*log((1+sin($lat))/(1-sin($lat)))-$e/2*log((1+$e*sin($lat))/(1-$e*sin($lat)));
		$R = $C*exp(-1*$n*$L);
		echo "L = ".$L."<br/>";
		echo "R = ".$R."<br/>";
		
		$gamma = $n*($lon-$gamma0);

		echo "Gamma =".$gamma."<br/>";
		
		$Lx = $Xs+($R*sin($gamma));
		$Ly = $Ys-($R*cos($gamma));
		echo "Lambert X:".$Lx;
		echo "Lambert Y:".$Ly."<br/>";
		$degArray['Latitude'] = $Lx;
		$degArray['Longitude'] = $Ly;
	}
	
	/**
	* Database initialisation
	* @return database initialised
	*/
	function initDatabase(){
		$servername = "localhost:8889";
		$username = "root";
		$password = "root";
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
	 * Calcul distances between two points in the lambert format
	 * @return distance between two points
	 */
	function calDistances($aPoint, $anotherPoint){
		return (sqrt ( pow($aPoint['Latitude'],2)
					  -pow($aPoint['Latitude'],2))
			   +sqrt ( pow($aPoint['Longitude'],2)
			   		  -pow($aPoint['Longitude'],2))			
		);
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
	* Generate a KML File in return from an array in input
	* @return kmlOutput le tableau pour le fichier kml
	* @param data le tableau des points
	*/
	function generateKMLFile($data, $fileOutputPath){
		$busLines = array();
		
		$busLines[] = 1;
		$busLines[] = 2;
		$busLines[] = 3;
		$busLines[] = 4;
		$busLines[] = 5;
		$busLines[] = 6;
		$busLines[] = 7;
		$busLines[] = 21;
		$busLines[] = 0;
		
		$busLinesIcon = array();
		
		$busLinesIcon[] = "http://tub-bourg.fr/var/ezwebin_site/storage/images/mediatheque/images/picto-ligne-18x18/l1/90587-1-fre-FR/L1_format_18x18.png";
		$busLinesIcon[] = "http://tub-bourg.fr/var/ezwebin_site/storage/images/mediatheque/images/picto-ligne-18x18/l2/90524-1-fre-FR/L2_format_18x18.png";
		$busLinesIcon[] = "http://tub-bourg.fr/var/ezwebin_site/storage/images/mediatheque/images/picto-ligne-18x18/l3/90533-1-fre-FR/L3_format_18x18.png";
		$busLinesIcon[] = "http://tub-bourg.fr/var/ezwebin_site/storage/images/mediatheque/images/picto-ligne-18x18/l4/90542-1-fre-FR/L4_format_18x18.png";
		$busLinesIcon[] = "http://tub-bourg.fr/var/ezwebin_site/storage/images/mediatheque/images/picto-ligne/ligne-5a/87925-4-fre-FR/Ligne-5A_format_18x18.png";
		$busLinesIcon[] = "http://tub-bourg.fr/var/ezwebin_site/storage/images/mediatheque/images/picto-ligne-18x18/l6/90560-1-fre-FR/L6_format_18x18.png";
		$busLinesIcon[] = "http://tub-bourg.fr/var/ezwebin_site/storage/images/mediatheque/images/picto-ligne-18x18/l7/90569-1-fre-FR/L7_format_18x18.png";
		$busLinesIcon[] = "http://tub-bourg.fr/var/ezwebin_site/storage/images/mediatheque/images/picto-ligne-18x18/l21/90578-1-fre-FR/L21_format_18x18.png";		
		$busLinesIcon[] = "http://maps.google.com/mapfiles/kml/shapes/info_circle.png";	
		
		$busLinesColor = array();
		
		$busLinesColor[1] = "0566A1";
		$busLinesColor[2] = "E2392F";		
		$busLinesColor[3] = "F9EA44";		
		$busLinesColor[4] = "9AC138";		
		$busLinesColor[5] = "2DBAEB";		
		$busLinesColor[6] = "BA7EB1";		
		$busLinesColor[7] = "F19315";		
		$busLinesColor[21] = "94C36A";		
		$busLinesColor[0] = "000000";		
		
		$kml = array();
		$kml[] = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
		$kml[] = "<kml xmlns=\"http://earth.google.com/kml/2.1\"> ";
		$kml[] = "<Document> ";
		$kml[] = "<name>Sig Project</name>";
		$kml[] = "<description>Project done for the SIG lesson. Done by Noe Colin and Quentin CHAPEL</description>";
		
		foreach($busLines as $key => $aLineBus){
			$kml[] = '<Style id="busLineIcon'.$aLineBus.'">';
			
			$kml[] = '<IconStyle id="busLineIcon'.$aLineBus.'">';
			$kml[] = '<Icon>';
			$kml[] = '<href>'.$busLinesIcon[$key].'</href>';
			$kml[] = '</Icon>';
			$kml[] = '</IconStyle>';
			
			$kml[] = '</Style>';


			$kml[] = '<Style id="busLineColor'.$aLineBus.'">';
			
			$kml[] = '<LineStyle>';
			$kml[] = '<color>'.$busLinesColor[$key].'</color>';
			$kml[] = '<width>4</width>';
			$kml[] = '</LineStyle>';
			$kml[] = '<PolyStyle>';
			$kml[] = '<color>'.$busLinesColor[$key].'</color>';
			$kml[] = '<width>4</width>';
			$kml[] = '</PolyStyle>';
			
			$kml[] = '</Style>';
		}
		
		foreach($data['points'] as $pointKey => $aPoint) 
		{
			$kmlStopId = removeAccents($aPoint['Nom']);
			$kml[] = '<Placemark id="placemark' . $kmlStopId . '">';
			$kml[] = '<name>' . $aPoint['Nom'] . '</name>';
			$kml[] = '<description>Arrêt de bus n°'.$pointKey . "|" . $aPoint['Nom']. ' | ' . 'Ligne n°' . $aPoint['busLinesId'] . '</description>';
			$kml[] = '<styleUrl>#busLineIcon'.$aPoint['busLinesId'].'</styleUrl>';
			$kml[] = '<Point>';
			$kml[] = '<coordinates>' . $aPoint['Longitude'] . ','  . $aPoint['Latitude'] . '</coordinates>';
			$kml[] = '</Point>';
			$kml[] = '</Placemark>';
		}
		
		foreach($busLinesColor as $busLineKey => $aLine) 
		{
			$kml[] = '<Placemark>';
			$kml[] = '<name>Ligne n°'.$busLineKey.'</name>';
			$kml[] = '<description>Ligne de bus n°'.$busLineKey.'</description>';
			$kml[] = '<styleUrl>#busLineColor'.$busLineKey.'</styleUrl>';
			$kml[] = '<LineString>';

			$kml[] = '<extrude>1</extrude>';
        	$kml[] = '<tessellate>1</tessellate>';
			$kml[] = '<altitudeMode>absolute</altitudeMode>';
			
			$kml[] = '<coordinates>';
			
			foreach($data['points'] as $aPoint){
				if($aPoint['busLinesId'] == $busLineKey){
					$kml[] = $aPoint['Longitude'] . ','  . $aPoint['Latitude'].',246.5';
				}
			}

			$kml[] = '</coordinates>';

			$kml[] = '</LineString>';
			$kml[] = '</Placemark>';
		}
		
		$kml[] = '</Document>';
		$kml[] = '</kml>';
		$kmlOutput = implode("\n", $kml);
		echo implode("<br/>", $kml);
		
		file_put_contents($fileOutputPath, $kmlOutput);
	}

	/////////////////////////////////////////

	function generateFilteredKMLFile($data, $fileOutputPath){
		$busLines = array();
		
		$busLines[] = 1;
		$busLines[] = 2;
		$busLines[] = 3;
		$busLines[] = 4;
		$busLines[] = 5;
		$busLines[] = 6;
		$busLines[] = 7;
		$busLines[] = 21;
		$busLines[] = 0;
		
		$busLinesIcon = array();
		
		$busLinesIcon[] = "http://tub-bourg.fr/var/ezwebin_site/storage/images/mediatheque/images/picto-ligne-18x18/l1/90587-1-fre-FR/L1_format_18x18.png";
		$busLinesIcon[] = "http://tub-bourg.fr/var/ezwebin_site/storage/images/mediatheque/images/picto-ligne-18x18/l2/90524-1-fre-FR/L2_format_18x18.png";
		$busLinesIcon[] = "http://tub-bourg.fr/var/ezwebin_site/storage/images/mediatheque/images/picto-ligne-18x18/l3/90533-1-fre-FR/L3_format_18x18.png";
		$busLinesIcon[] = "http://tub-bourg.fr/var/ezwebin_site/storage/images/mediatheque/images/picto-ligne-18x18/l4/90542-1-fre-FR/L4_format_18x18.png";
		$busLinesIcon[] = "http://tub-bourg.fr/var/ezwebin_site/storage/images/mediatheque/images/picto-ligne/ligne-5a/87925-4-fre-FR/Ligne-5A_format_18x18.png";
		$busLinesIcon[] = "http://tub-bourg.fr/var/ezwebin_site/storage/images/mediatheque/images/picto-ligne-18x18/l6/90560-1-fre-FR/L6_format_18x18.png";
		$busLinesIcon[] = "http://tub-bourg.fr/var/ezwebin_site/storage/images/mediatheque/images/picto-ligne-18x18/l7/90569-1-fre-FR/L7_format_18x18.png";
		$busLinesIcon[] = "http://tub-bourg.fr/var/ezwebin_site/storage/images/mediatheque/images/picto-ligne-18x18/l21/90578-1-fre-FR/L21_format_18x18.png";		
		$busLinesIcon[] = "http://maps.google.com/mapfiles/kml/shapes/info_circle.png";	
		
		$busLinesColor = array();
		
		$busLinesColor[1] = "0566A1";
		$busLinesColor[2] = "E2392F";		
		$busLinesColor[3] = "F9EA44";		
		$busLinesColor[4] = "9AC138";		
		$busLinesColor[5] = "2DBAEB";		
		$busLinesColor[6] = "BA7EB1";		
		$busLinesColor[7] = "F19315";		
		$busLinesColor[21] = "94C36A";		
		$busLinesColor[0] = "000000";		
		
		$kml = array();
		$kml[] = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
		$kml[] = "<kml xmlns=\"http://earth.google.com/kml/2.1\"> ";
		$kml[] = "<Document> ";
		$kml[] = "<name>Sig Project</name>";
		$kml[] = "<description>Project done for the SIG lesson. Done by Noe Colin and Quentin CHAPEL</description>";
		
		foreach($busLines as $key => $aLineBus){
			$kml[] = '<Style id="busLineIcon'.$aLineBus.'">';
			
			$kml[] = '<IconStyle id="busLineIcon'.$aLineBus.'">';
			$kml[] = '<Icon>';
			$kml[] = '<href>'.$busLinesIcon[$key].'</href>';
			$kml[] = '</Icon>';
			$kml[] = '</IconStyle>';
			
			$kml[] = '</Style>';


			$kml[] = '<Style id="busLineColor'.$aLineBus.'">';
			
			$kml[] = '<LineStyle>';
			$kml[] = '<color>'.$busLinesColor[$key].'</color>';
			$kml[] = '<width>4</width>';
			$kml[] = '</LineStyle>';
			$kml[] = '<PolyStyle>';
			$kml[] = '<color>'.$busLinesColor[$key].'</color>';
			$kml[] = '<width>4</width>';
			$kml[] = '</PolyStyle>';
			
			$kml[] = '</Style>';
		}
		
		foreach($data['points'] as $pointKey => $aPoint) 
		{
			$kmlStopId = removeAccents($aPoint['Nom']);
			$kml[] = '<Placemark id="placemark' . $kmlStopId . '">';
			$kml[] = '<name>' . $aPoint['Nom'] . '</name>';
			$kml[] = '<description>Arrêt de bus n°'.$pointKey . "|" . $aPoint['Nom']. ' | ' . 'Ligne n°' . $aPoint['busLinesId'] . '</description>';
			$kml[] = '<styleUrl>#busLineIcon'.$aPoint['busLinesId'].'</styleUrl>';
			$kml[] = '<Point>';
			$kml[] = '<coordinates>' . $aPoint['Longitude'] . ','  . $aPoint['Latitude'] . '</coordinates>';
			$kml[] = '</Point>';
			$kml[] = '</Placemark>';
		}
		
		foreach($busLinesColor as $busLineKey => $aLine) 
		{
			$kml[] = '<Placemark>';
			$kml[] = '<name>Ligne n°'.$busLineKey.'</name>';
			$kml[] = '<description>Ligne de bus n°'.$busLineKey.'</description>';
			$kml[] = '<styleUrl>#busLineColor'.$busLineKey.'</styleUrl>';
			$kml[] = '<LineString>';

			$kml[] = '<extrude>1</extrude>';
        	$kml[] = '<tessellate>1</tessellate>';
			$kml[] = '<altitudeMode>absolute</altitudeMode>';
			
			$kml[] = '<coordinates>';
			
			foreach($data['points'] as $aPoint){
				if($aPoint['busLinesId'] == $busLineKey){
					$kml[] = $aPoint['Longitude'] . ','  . $aPoint['Latitude'].',246.5';
				}
			}

			$kml[] = '</coordinates>';

			$kml[] = '</LineString>';
			$kml[] = '</Placemark>';
		}
		
		$kml[] = '</Document>';
		$kml[] = '</kml>';
		$kmlOutput = implode("\n", $kml);
		echo implode("<br/>", $kml);
		
		file_put_contents($fileOutputPath, $kmlOutput);
	}

	/////////////////////////////////////////
	
	/**
	 * Remove accents and spaces from text
	 */
	function removeAccents($inputText){
		$inputText = str_replace(" ", "", $inputText);
		if ( !preg_match('/[\x80-\xff]/', $inputText) ){
			return $inputText;
		}
        

    $chars = array(
    // Decompositions for Latin-1 Supplement
    chr(195).chr(128) => 'A', chr(195).chr(129) => 'A',
    chr(195).chr(130) => 'A', chr(195).chr(131) => 'A',
    chr(195).chr(132) => 'A', chr(195).chr(133) => 'A',
    chr(195).chr(135) => 'C', chr(195).chr(136) => 'E',
    chr(195).chr(137) => 'E', chr(195).chr(138) => 'E',
    chr(195).chr(139) => 'E', chr(195).chr(140) => 'I',
    chr(195).chr(141) => 'I', chr(195).chr(142) => 'I',
    chr(195).chr(143) => 'I', chr(195).chr(145) => 'N',
    chr(195).chr(146) => 'O', chr(195).chr(147) => 'O',
    chr(195).chr(148) => 'O', chr(195).chr(149) => 'O',
    chr(195).chr(150) => 'O', chr(195).chr(153) => 'U',
    chr(195).chr(154) => 'U', chr(195).chr(155) => 'U',
    chr(195).chr(156) => 'U', chr(195).chr(157) => 'Y',
    chr(195).chr(159) => 's', chr(195).chr(160) => 'a',
    chr(195).chr(161) => 'a', chr(195).chr(162) => 'a',
    chr(195).chr(163) => 'a', chr(195).chr(164) => 'a',
    chr(195).chr(165) => 'a', chr(195).chr(167) => 'c',
    chr(195).chr(168) => 'e', chr(195).chr(169) => 'e',
    chr(195).chr(170) => 'e', chr(195).chr(171) => 'e',
    chr(195).chr(172) => 'i', chr(195).chr(173) => 'i',
    chr(195).chr(174) => 'i', chr(195).chr(175) => 'i',
    chr(195).chr(177) => 'n', chr(195).chr(178) => 'o',
    chr(195).chr(179) => 'o', chr(195).chr(180) => 'o',
    chr(195).chr(181) => 'o', chr(195).chr(182) => 'o',
    chr(195).chr(182) => 'o', chr(195).chr(185) => 'u',
    chr(195).chr(186) => 'u', chr(195).chr(187) => 'u',
    chr(195).chr(188) => 'u', chr(195).chr(189) => 'y',
    chr(195).chr(191) => 'y',
    // Decompositions for Latin Extended-A
    chr(196).chr(128) => 'A', chr(196).chr(129) => 'a',
    chr(196).chr(130) => 'A', chr(196).chr(131) => 'a',
    chr(196).chr(132) => 'A', chr(196).chr(133) => 'a',
    chr(196).chr(134) => 'C', chr(196).chr(135) => 'c',
    chr(196).chr(136) => 'C', chr(196).chr(137) => 'c',
    chr(196).chr(138) => 'C', chr(196).chr(139) => 'c',
    chr(196).chr(140) => 'C', chr(196).chr(141) => 'c',
    chr(196).chr(142) => 'D', chr(196).chr(143) => 'd',
    chr(196).chr(144) => 'D', chr(196).chr(145) => 'd',
    chr(196).chr(146) => 'E', chr(196).chr(147) => 'e',
    chr(196).chr(148) => 'E', chr(196).chr(149) => 'e',
    chr(196).chr(150) => 'E', chr(196).chr(151) => 'e',
    chr(196).chr(152) => 'E', chr(196).chr(153) => 'e',
    chr(196).chr(154) => 'E', chr(196).chr(155) => 'e',
    chr(196).chr(156) => 'G', chr(196).chr(157) => 'g',
    chr(196).chr(158) => 'G', chr(196).chr(159) => 'g',
    chr(196).chr(160) => 'G', chr(196).chr(161) => 'g',
    chr(196).chr(162) => 'G', chr(196).chr(163) => 'g',
    chr(196).chr(164) => 'H', chr(196).chr(165) => 'h',
    chr(196).chr(166) => 'H', chr(196).chr(167) => 'h',
    chr(196).chr(168) => 'I', chr(196).chr(169) => 'i',
    chr(196).chr(170) => 'I', chr(196).chr(171) => 'i',
    chr(196).chr(172) => 'I', chr(196).chr(173) => 'i',
    chr(196).chr(174) => 'I', chr(196).chr(175) => 'i',
    chr(196).chr(176) => 'I', chr(196).chr(177) => 'i',
    chr(196).chr(178) => 'IJ',chr(196).chr(179) => 'ij',
    chr(196).chr(180) => 'J', chr(196).chr(181) => 'j',
    chr(196).chr(182) => 'K', chr(196).chr(183) => 'k',
    chr(196).chr(184) => 'k', chr(196).chr(185) => 'L',
    chr(196).chr(186) => 'l', chr(196).chr(187) => 'L',
    chr(196).chr(188) => 'l', chr(196).chr(189) => 'L',
    chr(196).chr(190) => 'l', chr(196).chr(191) => 'L',
    chr(197).chr(128) => 'l', chr(197).chr(129) => 'L',
    chr(197).chr(130) => 'l', chr(197).chr(131) => 'N',
    chr(197).chr(132) => 'n', chr(197).chr(133) => 'N',
    chr(197).chr(134) => 'n', chr(197).chr(135) => 'N',
    chr(197).chr(136) => 'n', chr(197).chr(137) => 'N',
    chr(197).chr(138) => 'n', chr(197).chr(139) => 'N',
    chr(197).chr(140) => 'O', chr(197).chr(141) => 'o',
    chr(197).chr(142) => 'O', chr(197).chr(143) => 'o',
    chr(197).chr(144) => 'O', chr(197).chr(145) => 'o',
    chr(197).chr(146) => 'OE',chr(197).chr(147) => 'oe',
    chr(197).chr(148) => 'R',chr(197).chr(149) => 'r',
    chr(197).chr(150) => 'R',chr(197).chr(151) => 'r',
    chr(197).chr(152) => 'R',chr(197).chr(153) => 'r',
    chr(197).chr(154) => 'S',chr(197).chr(155) => 's',
    chr(197).chr(156) => 'S',chr(197).chr(157) => 's',
    chr(197).chr(158) => 'S',chr(197).chr(159) => 's',
    chr(197).chr(160) => 'S', chr(197).chr(161) => 's',
    chr(197).chr(162) => 'T', chr(197).chr(163) => 't',
    chr(197).chr(164) => 'T', chr(197).chr(165) => 't',
    chr(197).chr(166) => 'T', chr(197).chr(167) => 't',
    chr(197).chr(168) => 'U', chr(197).chr(169) => 'u',
    chr(197).chr(170) => 'U', chr(197).chr(171) => 'u',
    chr(197).chr(172) => 'U', chr(197).chr(173) => 'u',
    chr(197).chr(174) => 'U', chr(197).chr(175) => 'u',
    chr(197).chr(176) => 'U', chr(197).chr(177) => 'u',
    chr(197).chr(178) => 'U', chr(197).chr(179) => 'u',
    chr(197).chr(180) => 'W', chr(197).chr(181) => 'w',
    chr(197).chr(182) => 'Y', chr(197).chr(183) => 'y',
    chr(197).chr(184) => 'Y', chr(197).chr(185) => 'Z',
    chr(197).chr(186) => 'z', chr(197).chr(187) => 'Z',
    chr(197).chr(188) => 'z', chr(197).chr(189) => 'Z',
    chr(197).chr(190) => 'z', chr(197).chr(191) => 's'
    );

    $inputText = strtr($inputText, $chars);
	}

	function getNextElements($sigData, $pointId){
		$nextPoints = [];
		foreach($sigData['arcs'] as $key => $anArc){
			if($anArc['Beginning'] == $pointId){
				$sigData['Points']['Sucesseurs'][$key] = $sigData['points'][$anArc['Ending']];
			}
		}
	}

	function initDijkstra($arcArray){
		foreach($arcArray as $anArc){
			$anArc['ColorDijkstra'] = "red";
			$anArc['DistanceDijkstra'] = -1;
			$anArc['PredecesseursDijkstra'] = -1;
		}
	}

	function initFirstCellDijkstra($anArc, $firstId){
		$anArc[$firstId]['ColorDijkstra'] = "grey";
		$anArc[$firstId]['DistanceDijkstra'] = 0;
		$anArc[$firstId]['PredecesseursDijkstra'] = 0;
	}

	function dijkstra($sigData, $firstId){
		initDijkstra($sigData['arc']);
		
	}
	$g = new Graph();
	$sigData = importData($g);
	$beginning = $_POST["depart"];
	$ending = $_POST["arrivee"];
	list($distances, $prev) = $g->paths_from($beginning);
	$path = $g->paths_to($prev, $ending);

	echo "<pre>";
	print_r($sigData);
	echo "</pre>";
	generateKMLFile($path,$DEFAULT_FILE_PATH);
	//generateKMLFile($sigData,$DEFAULT_FILE_PATH);
	foreach($sigData['points'] as $aPoint){
		convertDegToLambert($aPoint);
	}
?> 