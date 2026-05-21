<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sessions in PHP: Schritt 3</title>
</head>
<h1>Sessions in PHP</h1>
<h2>Schritt 3</h2>
<body>
    <?php
    session_start(); //Eine Sitzung beginnen
    $sId=session_id(); //Auslesen der SessionID


    //Ausgabe von Werten der superglobalen Variable Session
    //Alle Werte immer noch da
    echo "Hallo $_SESSION[vorname] $_SESSION[nachname], du bist $_SESSION[alter] Jahre alt, siehst aber aus wie 30!<br>";

    echo "SID: $sId<br>";
    echo "<a href ='sessions_4.php'><br>zur nächsten Seite</a>";


    ?>
    
</body>
</html>