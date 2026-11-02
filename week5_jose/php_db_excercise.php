<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO SQL Schritte</title>
</head>
<body>

   <?php

    $pdo = new PDO("mysql:host:localhost", "root", "");
    
    $sql = 'CREATE TABLE IF NOT EXISTS person(
            id INT AUTO_INCREMENT pk
            first_name VARCHAR(128) NOT NULL
            last_name VARCHAR(128) NOT NULL
            );';

    $sql = 'INSERT INTO person(first_name, last_name)
            VALUES (
            "Gustav",
            "Peter"
            );';

        $pdo->exec($sql);
   ?>

</body>
</html>
