<?php
// Set headers to allow JSON output
header('Content-Type: application/json');

$host = 'localhost'; 
$username = 'root'; // Your MySQL username
$password = '';     // Your MySQL password
$dbname = 'json'; 

try {
    // Establish connection to the MySQL database
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $qualifikation = $_GET['qualifikation'];

    $sql = "";
    $stmt = $pdo->prepare($ql);
    $stmt->bindParam(":qualifikation", $qualifikation);
    $stmt->execute();
    
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($results);

} catch (PDOException $e) {
    // Return an error message if connection fails
    http_response_code(500);
    echo json_encode(["error" => "Database connection failed: " . $e->getMessage()]);
}
?>
