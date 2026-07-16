<?php
function connectDB() 
{
	require_once "connection_data.inc.php";
	$server = "mysql:host=$host;dbname=$db";
	try
   {	
	   $dbh = new PDO($server, $user, $pw);
	   $dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $dbh;
	   echo "Verbindung zu DB erfolgreich!";
   }
   catch(PDOException $e)
   {
     echo "Fehler:<br> ".$e->getMessage()."<br>"; 
     die("Skript abgebrochen!");   
   }
	
	
}
//connectDB();  //nur zum TEST

?>