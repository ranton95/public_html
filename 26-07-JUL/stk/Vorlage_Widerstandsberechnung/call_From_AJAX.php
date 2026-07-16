<?php 
require_once "libs/phpMQTT_fixed.php";
require_once "connection_function.inc.php";

/* Funktionen und Konstanten */
function getClosest($search, $arr) {
	$closest = null;
	foreach ($arr as $item) {
	   if ($closest === null || abs($search - $closest) > abs($item - $search)) {
		  $closest = $item;
	   }
	}
	return $closest;
 }
$Reihen[6]  = array(1,1.5,2.2,3.3,4.7,6.8);
$Reihen[12] = array(1,1.2,1.5,1.8,2.2,2,7,3.3,3.9,4.7,5.6,6.8,8.2);
$Reihen[24] = array(1,1.1,1.2,1.3,1.5,1.6,1.8,2.0,2.2,2.4,2.7,3.0,3.3,3.6,3.9,4.3,4.7,5.1,5.6,6.2,6.8,7.5,8.2,9.1);
$Toleranz =   array(6=>0.2,12=>0.1,24=>0.05);





/* ---------------------------------------------------------------- */
/* AJAX Response: Daten als JSON-Objekt*/

$berechWert = getClosest(($R/pow(10,floor(log10($R)))), $Reihen[$E])*pow(10,floor(log10($R)));





/* ---------------------------------------------------------------- */
/* MQTT publish via php*/




$mqtt = new Bluerhinos\phpMQTT("test.mosquitto.org",1883, "");
if ($mqtt->connect(true, NULL, "", ""))
{
	 $mqtt->close();
} 

/* ---------------------------------------------------------------- */
/* MySQL Zugriff*/ 
$dbh=connectDB();
$eWert=$E;
$rWert=$R;
$calcWert=$berechneWert;

$res=dbh->prepare("INERT INTO widerstand
                 (w_ein,W_calc,w_ERE
")

   

?>