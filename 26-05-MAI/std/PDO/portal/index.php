<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title></title>
</head>
<body>
<h2>Startseite</h2>
<?php
session_start();
if(isset($_SESSION['loggedin']))
{
	echo "<p>Angemeldet als $_SESSION[loggedin]<br>";
	echo "<a href = \"logout.php\">Abmelden</a></p>"; 
}
else
{
	echo "<p>Sie sind nicht angemeldet</p>";
	header("Location: login.php");
} 

?>

</body>
</html>