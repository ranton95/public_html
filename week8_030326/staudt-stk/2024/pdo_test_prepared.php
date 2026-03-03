<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO-Test</title>
</head>
<body>
<?php

    // pdo_test_prepared.php
    ini_set("display_errors", "on");

    require_once "db_connection_function.php";

    // establish db connection
    $dbh = db_connect();

    // get data from form fields:
    /*    
    $u_firstname = $_REQUEST['firstname'];
    $u_lastname = $_REQUEST['lastname'];
    $u_email = $_REQUEST['email'];
    */
    

    // Try SQL - Injection
    // insert:
    // ');DELETE FROM user WHERE (u_email LIKE '%
    // into last field
    // is prevented by prepared statements (preferred):

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

    $stmt->bindParam(":input_1",$_REQUEST['firstname']);
    $stmt->bindParam(":input_2",$_REQUEST['lastname']);
    $stmt->bindParam(":input_3",$_REQUEST['email']);

    // bind with associative array

    $input = [
        ":input_1" => $_REQUEST['firstname'],
        ":input_2" => $_REQUEST['lastname'],
        ":input_3" => $_REQUEST['email']
    ];

   
    try {
        //if bind with pindParam
        // $stmt->execute();
        // if bind with associative array
        $stmt->execute($input);
        header('Location:pdo_test_ok.php');
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
    $res = $dbh->query($sql);

    /*
    echo $res_array = $res->fetchAll();
    echo "<pre>";
    print_r($res_array);
    echo "</pre>";

    ODER:
    */
   
    foreach($res as $row) {
        echo "$row[0] | $row[1] | $row[2] | $row[3]<br>";
    }

    // result consists of one row and multiple columns
    
    $sql = "SELECT * FROM user WHERE u_id = 21";
    $res = $dbh->query($sql)->fetch();
    /*
    echo "<pre>";
    print_r($res);
    echo "</pre>";
    */
    echo "<p>Searching User ID 3:<br>";
    echo "User found: $row[1] $row[2]</p>";


    // result representents one cell
    $sql = "SELECT u_firstname FROM user WHERE u_id = 21";
    $firstname = $dbh->query($sql)->fetchColumn();


    echo "<p>Searching First Name of User ID 3:<br>";
    echo "First Name of User found: $firstname </p>";
 



?>
    
</body>
</html>