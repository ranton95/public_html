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



    // Enable error reporting for debugging
    ini_set('display_errors', '1');
    error_reporting(E_ALL);

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

    // Diagnostics: show path and writable status
    echo '<h2>Zugriffsprotokoll (Debug)</h2>';
    echo '<p>Debug: log path: <code>' . htmlspecialchars($logFile, ENT_QUOTES, 'UTF-8') . '</code></p>';
    echo '<p>Debug: directory writable: <strong>' . (is_writable(__DIR__) ? 'yes' : 'no') . '</strong></p>';
    echo '<p>Debug: file exists: <strong>' . (file_exists($logFile) ? 'yes' : 'no') . '</strong></p>';
    if (file_exists($logFile)) {
        echo '<p>Debug: file writable: <strong>' . (is_writable($logFile) ? 'yes' : 'no') . '</strong></p>';
        $info = stat($logFile);
        if ($info !== false) {
            echo '<p>Debug: file owner UID: <code>' . htmlspecialchars((string)$info['uid'], ENT_QUOTES, 'UTF-8') . '</code>, perms: <code>' . substr(sprintf('%o', $info['mode']), -4) . '</code></p>';
        }
    }

    // Show which PHP user/SAPI is running (helps debug webserver permissions)
    echo '<p>Debug: PHP SAPI: <code>' . htmlspecialchars(php_sapi_name(), ENT_QUOTES, 'UTF-8') . '</code></p>';
    echo '<p>Debug: get_current_user(): <code>' . htmlspecialchars(get_current_user(), ENT_QUOTES, 'UTF-8') . '</code></p>';
    if (function_exists('getmyuid')) {
        $uid = getmyuid();
        echo '<p>Debug: getmyuid(): <code>' . htmlspecialchars((string)$uid, ENT_QUOTES, 'UTF-8') . '</code></p>';
        if (function_exists('posix_getpwuid')) {
            $pw = posix_getpwuid($uid);
            if ($pw !== false) {
                echo '<p>Debug: process owner name: <code>' . htmlspecialchars($pw['name'], ENT_QUOTES, 'UTF-8') . '</code></p>';
            }
        }
    }

    // Try to write and capture errors
    $bytes = @file_put_contents($logFile, $entry, FILE_APPEND | LOCK_EX);
    if ($bytes === false) {
        $err = error_get_last();
        echo '<p style="color:darkred;">Write failed. PHP error info: <pre>' . htmlspecialchars(print_r($err, true), ENT_QUOTES, 'UTF-8') . '</pre></p>';
        echo '<p>Possible fixes: ensure the webserver/PHP user can write to this directory or create the file and make it writable.</p>';
    } else {
        echo '<p>Eintrag geschrieben: <code>' . htmlspecialchars(trim($entry), ENT_QUOTES, 'UTF-8') . '</code></p>';
    }

    // Count total accesses (one line per access). Skip empty lines.
    $total = 0;
    if (file_exists($logFile)) {
        $lines = file($logFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        if ($lines !== false) {
            $total = count($lines);
        }
    }

    echo '<p>Insgesamt protokollierte Zugriffe: <strong>' . (int)$total . '</strong></p>';
    ?>
</body>
</html>

