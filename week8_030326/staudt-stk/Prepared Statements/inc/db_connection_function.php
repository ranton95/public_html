<?php
// db_connection_function.php
function db_connect() {
    require_once "db_connection_data.php";

  // $db_server = "mysql:dbname=testdb;host=127.0.0.1";
     $db_server = "$db_engine:dbname=$db_name;host=$db_host";

     try {
        $dbh = new PDO($db_server, $db_user, $db_password);
        echo "<p>DB Connection succesfull established!</p>";
        return $dbh; 
     }
     catch(PDOException $e) {
        //echo $e->getMessage();
        die("<p>Could not connect to DB! Try again later</p>");
    }
}

// Test:
// db_connect();


?>



