<?php

header('Content-Type: application/json; charset=utf-8');

$qualification = $_GET['qualification'] ?? '';

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
        "SELECT 
            mitarbeiter.Name AS name,
            qualifikation.Qualifikation AS qualification
         FROM mitarbeiter
         INNER JOIN mitarbeiter_hat_qualifikation
            ON mitarbeiter.idMitarbeiter = mitarbeiter_hat_qualifikation.Mitarbeiter_idMitarbeiter
         INNER JOIN qualifikation
            ON qualifikation.idQualifikation = mitarbeiter_hat_qualifikation.Qualifikation_idQualifikation
         WHERE qualifikation.Qualifikation = :qualification"
    );

    $statement->bindParam(':qualification', $qualification);
    $statement->execute();

    echo json_encode($statement->fetchAll(PDO::FETCH_ASSOC));

} catch (PDOException $exception) {
    echo json_encode([
        'error' => $exception->getMessage()
    ]);
}