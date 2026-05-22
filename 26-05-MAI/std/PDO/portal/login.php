<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title></title>
</head>
<body>
<h2>Anmelden</h2>
<form>
	<label>E-Mail: <input name = "email"></label><br>
	<label>Passwort: <input name = "pw"></label><br>
	<input type="submit">
</form>
<?php
	session_start();
	require_once	"../inc/db_connection_function.php";
	//DB-Verbindung aufbauen----------------------------------------------------
	$dbh = db_connect();
	
	
	if(!empty($_REQUEST)) 
	{
		if($_REQUEST['email'] != "" AND $_REQUEST['pw'] != "")
		{		
			$email = $dbh -> quote($_REQUEST['email']);
			$pw 	 = $dbh -> quote($_REQUEST['pw']);
			
			//DB-Befehl erstellen-------------------------------------------------------
			$query = "	SELECT * FROM user 
							WHERE u_email = $email 
								  AND u_pw = $pw";
			//DB-Befehl ausführen-------------------------------------------------------
			
			try
			{		
				$res = $dbh -> query($query) -> fetch();
				if($res)
				{
					$_SESSION['loggedin'] = $email; 
					echo "<p>Angemeldet als $_SESSION[loggedin]!</p>";
				}
				else
				{
					echo "<p>Benutzer nicht registriert oder Anmeldedaten falsch!</p>";			
				}				
				
			
			}
			catch(PDOException $e)
			{				
				echo "<p>Ooops, da ist was schief gelaufen!<br>";
				die("Versuchen Sie es später noch einmal!</p>");				
			}
			
		}
		else
		{
			echo "<p>Beide Felder müssen ausgefüllt werden!</p>";		
		}
		// Ende Felder alle ausgefüllt?
				
	} //Ende Submit gedrückt?

	
?>
</body>
</html>