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

$sql = "INSERT INTO user VALUES (
    NULL,
    'Volker',
    'Schattke',
    'schattke@wvss-mannheim.de'
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

echo $customErrorMessage;

// Read records from db

// result consists pf multiple rows and columns
/* In der regel auch hier mit Try catch block */

$sql = "SELECT * FROM user";

$result = $dbConnection->query($sql)->fetchAll( ); // query gibt was zurück, aber exec executes ausführt
//coverts result set into array
echo "<pre>";
print_r($result);
echo "</pre>";


foreach($result as $row){
    echo "$row[0] | $row[1] | $row[2] | $row[3]<br>";
}




?>

</body>
</html>