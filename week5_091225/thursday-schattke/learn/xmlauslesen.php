<?php 

//Datien laden

$xmlDoc = new DOMDocument();
$xmlDoc->load("personen.xml");

//Einfache ausgabe
echo $xmlDoc->saveXML();

$benutzer = $xmlDoc->getElementsByTagName("benutzer");

foreach($benutzer as $benutzerdaten)
{
    foreach($benutzerdaten->childNodes as $element){
        if($element->nodeName == "benutzername"){
            echo "<strong>Person:</strong>" .$element->textContent."<br>";
        }
    }
}

?>