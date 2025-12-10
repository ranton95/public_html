<?php 

// db connection function.php

function db_connect(){
    require_once "db_connection_data.php";
    $db_server = "$db_engine:dbname=$db_name;host=$db_host";

    try{
        $pdo = new PDO($db_server, $db_user, $db_password);
        echo "<p>DB connection successfuly established </p>";
        return $pdo;
    }
    catch(PDOException $e){
        echo $e->getMessage();
        die("<p>Could not connect to DB! Try again later</p>");
    }
    
}

// db_connect();

// after this go to http://localhost/phpmyadmin/ and login with user: phpmyadmin 
// password: server and create a database table: E1FI2_2024_Sta as mentioned in the db_connecton_data file


?>

