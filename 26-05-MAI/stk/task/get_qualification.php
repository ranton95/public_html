<?php

header('Content-Type: application/json; charset=utf-8');

$host = 'localhost';
$dbname = 'json';
$username = 'root';
$password = '';

try {
    $connection = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8",
        $username,
        $password
    );

    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $statement = $connection->prepare(
        "SELECT Qualifikation AS qualification
         FROM qualifikation
         ORDER BY Qualifikation"
    );

    $statement->execute();

    echo json_encode($statement->fetchAll(PDO::FETCH_ASSOC));

} catch (PDOException $exception) {
    echo json_encode([
        'error' => $exception->getMessage()
    ]);
}