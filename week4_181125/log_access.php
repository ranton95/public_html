<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
/*

Erstellen Sie ein PHP-Skript namens „log_access.php”, das jeden Aufruf der Seite in
der Textdatei „access_log.txt” speichert.
Beim Aufruf der Seite soll das Skript das aktuelle Datum und die aktuelle Uhrzeit
erfassen.
- das aktuelle Datum und die aktuelle Uhrzeit erfassen.
- die IP-Adresse des Clients ermitteln (Tipp: $_SERVER)
- diese Informationen in die Datei access_log.txt im selben Verzeichnis
schreiben.

Bonus:
Geben Sie im Browser zusätzlich an, wie viele Zugriffe insgesamt schon
protokolliert wurden.
Tipp: Schauen Sie sich die Funktionen file() und readfile() an oder nutzen Sie
fread() wie bisher.

*/    



  // Log access: record current date/time and client IP to access_log.txt
    date_default_timezone_set('Europe/Berlin'); // set as appropriate

    $logFile = __DIR__ . '/access_log.txt';

    // Get timestamp and client IP (respect X-Forwarded-For if present)
    $now = date('Y-m-d H:i:s');
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ips = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
        $clientIp = trim($ips[0]);
    } else {
        $clientIp = $_SERVER['REMOTE_ADDR'] ?? 'Unknown';
    }

    // Prepare log entry
    $entry = sprintf("%s - %s\n", $now, $clientIp);

    // Append the entry to the log file with an exclusive lock
    @file_put_contents($logFile, $entry, FILE_APPEND | LOCK_EX);

    // Count total accesses (one line per access). Skip empty lines.
    $total = 0;
    if (file_exists($logFile)) {
        $lines = file($logFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        if ($lines !== false) {
            $total = count($lines);
        }
    }

    // Output a friendly message to the browser
    echo '<h2>Zugriffsprotokoll</h2>';
    echo '<p>Eintrag geschrieben: <code>' . htmlspecialchars(trim($entry), ENT_QUOTES, 'UTF-8') . '</code></p>';
    echo '<p>Insgesamt protokollierte Zugriffe: <strong>' . (int)$total . '</strong></p>';
    ?>
</body>
</html>

