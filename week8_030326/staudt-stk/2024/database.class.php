<?php

class Database {
    private static ?Database $instance = null; // Speichert die einzige Instanz
    // In PHP 7.1 und höher können Typen als nullable deklariert werden, indem ein Fragezeichen (?) vor dem Typnamen hinzugefügt wird. 
    // Dies bedeutet, dass die Variable entweder den angegebenen Typ (in diesem Fall Database) oder den Wert null annehmen kann.
    // In diesem Fall wird ?Database verwendet, um zu verdeutlichen, dass die statische Variable $instance zu Beginn null ist und erst 
    // später mit einer Instanz der Database-Klasse initialisiert wird. 
    // Dies ist wichtig für die Singleton-Implementierung, da die Instanz erst bei der ersten Anfrage an die getInstance-Methode erstellt wird.
    // Das ? ermöglicht eine klare und sichere Handhabung von Variablen, die möglicherweise nicht initialisiert sind, und ist besonders nützlich 
    // in Mustern wie Singleton, wo die Instanz erst bei Bedarf erstellt wird.
    
    private PDO $connection; // PDO-Verbindung

    // Konstruktor ist privat, um direkte Erstellung zu verhindern
    private function __construct() {
        $host = "localhost";
        $dbName = "test_db";
        $username = "phpmyadmin";
        $password = "server";

        try {
            $this->connection = new PDO("mysql:host=$host;dbname=$dbName", $username, $password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Datenbankverbindung fehlgeschlagen: " . $e->getMessage());
        }
    }

    // Gibt die einzige Instanz der Klasse zurück
    public static function getInstance(): Database {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    // Gibt die PDO-Verbindung zurück
    public function getConnection(): PDO {
        return $this->connection;
    }
}

// Nutzung der Klasse
$db = Database::getInstance(); // Immer dasselbe Objekt
$connection = $db->getConnection(); // Zugriff auf die Datenbankverbindung

// Beispielabfrage
$stmt = $connection->query("SELECT * FROM test_table");
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<pre>";
print_r($data);
echo "</pre>";
?>
