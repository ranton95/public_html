<?php
include("Konto.class.php");
/***************MAIN***********/

//Objekte erzeugen (instanzieren)
$konto1=new Konto(0, 10.0, "gruen");

$re1->showFlaeche();



$re2=new Rechteck(20.5, 10.0, "rot");
$re2->seiteA=1258;
$re2->seiteB=2369;
$re2->farbe="rot";
$re2->showUmfang();
$re2->showFlaeche();

?>