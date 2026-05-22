<?php
// db_hardwarefuchs.php
function db_connect() {
    require_once "db_hardwarefuchs.php";

  // $db_server = "mysql:dbname=testdb;host=127.0.0.1";
     $db_server = "$db_engine:dbname=$db_name;host=$db_host";

     try {
        $dbh = new PDO($db_server, $db_user, $db_password);
        echo "<p> Verbindung erfolgreich!</p>";
        return $dbh; 
     }
     catch(PDOException $e) {
        //echo $e->getMessage();
        die("Verbindung fehlgeschlagen</p>");
    }
}

// Test:
// db_connect();


?>



