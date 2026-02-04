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
$u_firstname = $_REQUEST['firstname'];
$u_lastname = $_REQUEST['lastname'];
$u_email = $_REQUEST['email'];
 

// Insert new record into db    
$sql = "INSERT INTO user (firstname, lastname, email) VALUES (:firstname, :lastname, :email)";

try {
    $stmt = $dbh->prepare($sql);
    $stmt->execute([
        ':firstname' => $u_firstname,
        ':lastname' => $u_lastname,
        ':email' => $u_email
    ]);
    echo "<p>Insert succeeded!</p>";   
}";

try {
    $dbh->exec($sql);
    echo "<p>Insert succeded!</p>";   
}
catch(PDOException $e) {
    $errMsg = $e->getMessage();
    $errCode = $e->getCode(); 
    echo "<p>Error-Message: $errMsg <br>"; 
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
echo "<pre>";
print_r($res);
echo "</pre>";


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
    
</body>
</html>