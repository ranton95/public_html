<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php 

require_once "inc/db_connection_function.php";

$dbConnection = db_connect();


$sql = "INSERT INTO user VALUES (
    NULL,
    'Micheal',
    'Staudt',
    'staudt@wvss-mannheim.de'
    );";

try{
    $dbConnection->exec($sql);
    echo "<p>Insert succeed!<p>";
}
catch(PDOException $e){
    $errorMessage = $e->getMessage();
    $errorCode = $e->getCode();
    echo  "<p>Error Message: $errorMessage <br>";
    echo  "<p>Error code: $errorCode <br>";

    switch($errorCode){
        case "23000" : $customErrorMessage = "<p>Email-Address already exists!</p>"; break;
        default:  $customErrorMessage = "<p>Opps, something went wrong!</p>";
    }
}

?>

</body>
</html>