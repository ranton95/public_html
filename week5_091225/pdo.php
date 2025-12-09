<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php 
    
    $pdo = new PDO(dsn: "mysql:host=localhost; dbname=person", username: "phpmyadmin", password: "server");
    echo "Verbindung erfolgreich!";

    $sql = "CREATE TABLE person (
            id INT AUTO_INCREMENT PRIMARY KEY,
            first_name VARCHAR(50) NOT NULL,
            last_name VARCHAR(100) NOT NULL
            )";

    $sql = "INSERT INTO person VALUES (
            'Gustav'
            'Peter'
        );
    ";

    $pdo->exec($sql);

    ?>php

</body>
</html>