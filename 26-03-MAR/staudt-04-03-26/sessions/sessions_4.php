<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sessions in PHP: Schritt 4</title>
</head>
<h1>Sessions in PHP</h1>
<h2>Schritt 4</h2>
<body>
    <?php
    session_start(); //Eine Sitzung beginnen
    $sId=session_id(); //Auslesen der SessionID

    echo "SSID: $sId";

    //Session beenden
    session_destroy();
    $sId = session_id();

    echo "<p>Nach session_destroy() sind die Werte weg: </p>";
    echo "Vorname: $_SESSION[vorname]<br>";
    echo "Nachname: $_SESSION[nachname]<br>";
    echo "Alter: $_SESSION[alter]<br>";
    ?>
    
</body>
</html>