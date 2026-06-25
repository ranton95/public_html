<?php

$host = "localhost";
$username = "phpmyadmin";
$password = "server";
$dbname = "json";

try {
  $conn = new PDO("mysql:host=$host;dbname=$dbname", 
                  $username, 
                  $password);

  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";

  //statement & then json encode
    $sql = "";
    
    $statement = $conn->prepare($sql);

    $statement->bind_param( ); //todo: fill the binding eg. ':qualification', $qualification
    $statement->execute();
    echo json_encode($statement->fetchAll(PDO::FETCH_ASSOC));

} catch(PDOException $e) {
  echo json_encode(["Connection failed: " . $e->getMessage()]);
}

?>
