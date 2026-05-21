<?php

$xmlDoc = new DOMDocument("1.0", "utf-8");
$xmlDoc->formatOutput = true;


//Root Element 
$xmlRoot = $xmlDoc->createElement("personen");
$xmlDoc->appendChild($xmlRoot);

// 1st node user
$xmlPerson = $xmlDoc->createElement("benutzer"); 

// child node of user: username and password
$xmlBenutzername = $xmlDoc->createElement("benutzername", "schattke");
$xmlPerson->appendChild($xmlBenutzername);

$xmlPasswort = $xmlDoc->createElement("passwort", "12345");
$xmlPerson->appendChild($xmlPasswort);

$xmlRoot->appendChild($xmlPerson);


// 2nd node user
$xmlPerson = $xmlDoc->createElement("benutzer"); 

// child node of user: username and password
$xmlBenutzername = $xmlDoc->createElement("benutzername", "Wowo");
$xmlPerson->appendChild($xmlBenutzername);

$xmlPasswort = $xmlDoc->createElement("passwort", "12345");
$xmlPerson->appendChild($xmlPasswort);

$xmlRoot->appendChild($xmlPerson);

//create file
$file = "personen.xml";
$xmlDoc->save($file);

?>