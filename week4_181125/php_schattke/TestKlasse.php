<?php
include("Rechteck.class.php");
/***************MAIN***********/

//Objekte erzeugen (instanzieren)
$re1=new Rechteck(20.5, 10.0, "gruen");
// $re1->seiteA=5.3;
// $re1->seiteB=12.5;
// $re1->farbe="grün";
// $re1->showUmfang();
// $re1->showFlaeche();
$re1->showFlaeche();



$re2=new Rechteck(20.5, 10.0, "rot");
$re2->seiteA=1258;
$re2->seiteB=2369;
$re2->farbe="rot";
$re2->showUmfang();
$re2->showFlaeche();

?>