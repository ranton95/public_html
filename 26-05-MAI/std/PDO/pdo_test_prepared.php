<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO-Test</title>
</head>
<body>
<?php
// pdo_test.php
require_once "inc/db_connection_function.php";

// establish db connection
$dbh = db_connect();


// get data from form fields: 
// SQL-Injection-Angriff verhindern durch quote()

// $u_firstname = $dbh->quote($_REQUEST['firstname']);
// $u_lastname = $dbh->quote($_REQUEST['lastname']);
// $u_email = $dbh->quote($_REQUEST['email']);
 
// SQL-Injection-Angriff (in letztes Feld eingeben) 
// ');DELETE FROM user WHERE (u_email LIKE '%

// Insert new record into db    

/* Prepared Statements senden SQL-Befehl und Daten in zwei getrennten Schritten an die Datenbank:

Prepare: Die Query-Struktur wird festgelegt und kompiliert.
Execute: Die Werte werden separat eingesetzt – nur noch als Daten, nie als SQL-Code.

Da die Struktur schon vor dem Einsetzen der Werte feststeht, 
kann eine Benutzereingabe die Logik der Query nicht mehr verändern.*/

$stmt = $dbh->prepare(
    "   
       INSERT INTO user VALUES (
           NULL,
           :input_1,
           :input_2,
           :input_3
   );"
);

// bind with pindParam 

// $stmt->bindParam(":input_1",$_REQUEST['firstname']);
// $stmt->bindParam(":input_2",$_REQUEST['lastname']);
// $stmt->bindParam(":input_3",$_REQUEST['email']);


 // bind with associative array

 $input = [
    ":input_1" => $_REQUEST['firstname'],
    ":input_2" => $_REQUEST['lastname'],
    ":input_3" => $_REQUEST['email']
];



try {
    //if bound with pindParam
    // $stmt->execute();  
    // if bind with associative array
    $stmt->execute($input);
    // echo "<p>Insert succeded!</p>";   
    header('location:pdo_test_ok.php');
    // Weiterleitung
}
catch(PDOException $e) {
    $errMsg = $e->getMessage();
    $errCode = $e->getCode(); 
    // echo "<p>Error-Message: $errMsg <br>"; 
    // echo "Error-Code: $errCode </p>";  
    
    switch($errCode) {
        case "23000": $custErrMsg = "<p>Email-Adress already exists!</p>"; break;
        default: $custErrMsg = "<p>Oooops, something went wrong!</p>";
    }
    echo $custErrMsg;
}



// #######################################################

// Read records form db  
    
// result consists of multiple rows and columns
/* In der Regel auch hier mit Try-Catch-Block */

    
$sql = "SELECT * FROM user";
// $res = $dbh->query($sql);
$res = $dbh->query($sql)->fetchAll(); // Converts result set into Array (multi-dim)
/* 
echo "<pre>";
print_r($res);
echo "</pre>";
*/

foreach($res as $row) {
    echo "$row[0] | $row[1] | $row[2] | $row[3]<br>";
}
     

// result consists of one row and multiple columns
$sql = "SELECT * FROM user WHERE u_id = 24";
$res = $dbh->query($sql)->fetch();
/*
echo "<pre>";
print_r($res);
echo "</pre>";
*/
echo "<p>Searching User ID 24:<br>";
if($res) {
    echo "User found: $row[1] $row[2]</p>";
}
else {
    echo "No User found</p>";
}

// result represents one cell
$sql = "SELECT u_firstname FROM user WHERE u_id = 24";
$firstname = $dbh->query($sql)->fetchColumn();

echo "<p>Searching First Name of User ID 24:<br>";
echo "First Name of User found: $firstname </p>";


?>
<p><a href = "pdo_test_form.php">Try again!</a></p>
    
</body>
</html>