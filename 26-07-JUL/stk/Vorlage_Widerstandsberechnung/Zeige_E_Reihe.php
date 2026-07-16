<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="data:;base64,iVBORw0KGgo=">
    <title>E-Reihe</title>
	
  </head>
  <body>
	<h1> Darstellung der E-Reihe</h1>
  
  <?php
  $r1 = $_POST['R1'];
  $r2 = $_POST['R2'];
  $r3 = $_POST['R3'];

  $ergebnis = ($r1*10+$r2)*pow(10,$r3);

  echo"<h2>Der Wert beträgt {$ergebnis} Ohm. </h2>";

  ?>
  <div>
    <img src="FarbCode.png" alt="Farbcodedarstellung" width=50%>
  </div>

  <div>
    <a href="start.html">Zurück</a>
  </div>
  
	
  </body>
</html>
