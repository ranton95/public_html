<?php 

//Datien laden

$xmlDoc = new DOMDocument();
$xmlDoc->load("klassenliste.xml");

//Einfache ausgabe
//echo $xmlDoc->saveXML();

$schueler = $xmlDoc->getElementsByTagName("schueler");

foreach($schueler as $schuelerdaten)
{
    echo $schuelerdaten;
    // foreach($schuelerdaten->childNodes as $element){
    //     if($element->nodeName == "vorname"){
    //         /**
    //          * Outputs the XML element's text content with a label.
    //          * 
    //          * Uses the concatenation operator (.) to join strings together:
    //          * - "vorname:" is a static label
    //          * - $element->textContent retrieves the text value from the XML element
    //          * - "<br>" adds an HTML line break for web display
    //          * 
    //          * Note: For terminal output with separate lines, use "\n" instead of "<br>":
    //          * echo "vorname: " . $element->textContent . "\n";
    //          * 
    //          * The dot (.) operator concatenates strings in PHP.
    //          */
    //         echo "  " . "vorname:" . $element->textContent ."\n";
    //     } elseif($element->nodeName == "nachname" ){
    //         echo "  " . "nachname:" . $element->textContent . "\n";
    //     }

}

?>