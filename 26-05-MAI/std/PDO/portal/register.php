<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Portal: Registrieren</title>
</head>
<body>
<h2>Registrieren</h2>
<?php
require_once "../inc/db_connection_function.php";
require_once "functions.php";

// establish db connection
$dbh = db_connect();
$error = "";


if(!empty($_REQUEST)) { // Button gecklickt?
	if($_REQUEST['email'] != "" AND $_REQUEST['pw'] != "") { // Alle Felder ausgefüllt?		      
       
		if(checkPasswordStrength($_REQUEST['pw']) AND isValidEmail($_REQUEST['email'])) {
			$pw = password_hash($_REQUEST['pw'], PASSWORD_DEFAULT);
			$email = $_REQUEST['email'];
			$query = "INSERT INTO user VALUES (NULL, :email, :pw)";
			$stmt = $dbh->prepare($query);

			$stmt->bindParam(':email', $email);
			$stmt->bindParam(':pw',    $pw);
			
			try {			
				$stmt->execute();				
			}
			catch(PDOException $e) {
				$errMsg = $e->getMessage();
				$errCode = $e->getCode(); 
							
				switch($errCode) {
					case "23000": $custErrMsg = "<p>Email-Adress already exists!</p>"; break;
					default: $custErrMsg = "<p>Oooops, something went wrong!</p>";
				}
				echo $custErrMsg;
			}
		} else {
			$error .= "Passwort zu schwach oder Email-Adresse inkorrekt<br>";
		} // Ende Prüfung PW und Email?
	
	} else {	
		$error .= "Beide Felder müssen ausgefüllt werden!<br>";		
	} // Ende Felder alle ausgefüllt?
}


if($error != "") echo $error;
?>

<form>
	<label>E-Mail: <input name="email" value="<?= htmlspecialchars($email ?? '') ?>"></label><br>
	<label>Passwort: <input name = "pw"></label><br>
	<button>Registrieren</button>
</form>

	
</body>
</html>