<?php
//1.Set headers to allow JSON output
header('Content-Type: application/json');

//2.Endpoint parameter input, provided or empty
$qualifikation = $_GET['qualifikation'] ?? "";

//3.connection to phpmyadmin server
$host = 'localhost'; 
$username = 'phpmyadmin';
$password = 'server';    
$dbname = 'json'; 

try {
    //4.Establish connection to the MySQL database
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //5.Execute query
    $sql = "SELECT mitarbeiter.Name as name,
                   qualifikation.Qualifikation as qualification 
            FROM mitarbeiter
            INNER JOIN mitarbeiter_hat_qualifikation
            ON mitarbeiter.idMitarbeiter = mitarbeiter_hat_qualifikation.Mitarbeiter_idMitarbeiter
            INNER JOIN qualifikation
            ON qualifikation.idQualifikation = mitarbeiter_hat_qualifikation.Qualifikation_idQualifikation
            WHERE qualifikation.Qualifikation = :qualifikation";
    
    $statement = $pdo->prepare($sql);                  
    $statement->bindParam(":qualifikation", $qualifikation);
    $statement->execute();
                                                      
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($results);

} catch (PDOException $e) {
    //6. Return an error message if connection fails
    http_response_code(500);
    echo json_encode(["error" => "Database connection failed: " . $e->getMessage()]);
}
?>
