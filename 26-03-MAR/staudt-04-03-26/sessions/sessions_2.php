<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sessions in PHP: Schritt 2</title>
</head>
<h1>Sessions in PHP</h1>
<h2>Schritt 2</h2>
<body>
    <?php
    session_start(); //Eine Sitzung beginnen
    $sId=session_id(); //Auslesen der SessionID

    //Hinzufügen von Werten zu der superglobalen Variable Session
    $_SESSION['alter'] = 56;

    //Ausgabe von Werten der superglobalen Variable Session
    echo "Hallo $_SESSION[vorname] $_SESSION[nachname]<br>";

    echo "SID: $sId<br>";
    echo "<a href ='sessions_3.php'><br>zur nächsten Seite</a>";


    ?>
    
</body>
</html>