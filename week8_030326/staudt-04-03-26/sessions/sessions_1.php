<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sessions in PHP: Schritt 1</title>
</head>
<h1>Sessions in PHP</h1>
<h2>Schritt 1</h2>
<body>
    <?php
    session_start(); //Eine Sitzung beginnen
    $sId=session_id(); //Auslesen der SessionID

    //Speichern von Werten in der superglobalen Variable Session
    $_SESSION['vorname'] = "Michael";
    $_SESSION['nachname'] = "Staudt";
    echo "SID: $sId<br>";
    echo "<a href ='sessions_2.php'><br>zur nächsten Seite</a>";

    ?>
    
</body>
</html>