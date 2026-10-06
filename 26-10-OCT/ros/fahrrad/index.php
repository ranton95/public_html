<?php
require __DIR__ . '/config.php';

$message = '';
if (isset($_GET['success'])) {
    $message = '<p style="color: green; font-weight: bold;">Datensatz erfolgreich gespeichert.</p>';
}
if (isset($_GET['error'])) {
    $message = '<p style="color: red; font-weight: bold;">' . htmlspecialchars($_GET['error']) . '</p>';
}

try {
    $pdo = getPdo();
    $rows = $pdo->query('SELECT fahrradNr, rahmenNr, tagesmietpreis, anschaffungsdatum, artikelNr FROM fahrraeder ORDER BY fahrradNr DESC LIMIT 10')->fetchAll();
} catch (Throwable $e) {
    $rows = [];
    $message = '<p style="color: red; font-weight: bold;">Datenbank nicht gefunden oder nicht importiert: ' . htmlspecialchars($e->getMessage()) . '</p>';
}
?>
<!doctype html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <title>Fahrradverleih</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 900px; margin: 40px auto; padding: 0 20px; }
        form { background: #f5f5f5; padding: 20px; border-radius: 8px; }
        label { display: block; margin-top: 12px; }
        input { width: 220px; padding: 8px; margin-top: 6px; }
        button { margin-top: 16px; padding: 10px 16px; }
        table { width: 100%; border-collapse: collapse; margin-top: 30px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        .small { font-size: 0.9em; }
    </style>
</head>
<body>
    <h1>Fahrradverleih</h1>
    <p class="small">Importiere zuerst die Datei <strong>fahrradverleih.sql</strong> in phpMyAdmin und erstelle dann die Datenbank <strong>fahrradverleih</strong>.</p>

    <?php echo $message; ?>

    <form method="post" action="save_fahrrad.php">
        <label>Rahmennummer:
            <input type="text" name="rahmenNr" maxlength="20" required>
        </label>

        <label>Tagesmietpreis:
            <input type="text" name="tagesmietpreis" placeholder="z. B. 12,50" required>
        </label>

        <label>Anschaffungsdatum:
            <input type="date" name="anschaffungsdatum" required>
        </label>

        <label>Artikelnummer:
            <input type="number" name="artikelNr" min="1" required>
        </label>

        <button type="submit">Speichern</button>
    </form>

    <h2>Letzte Datensätze</h2>
    <?php if (!$rows): { echo '<p>Keine Datensätze vorhanden.</p>'; } else: ?>
        <table>
            <tr>
                <th>Nr</th>
                <th>RahmenNr</th>
                <th>Preis</th>
                <th>Datum</th>
                <th>ArtikelNr</th>
            </tr>
            <?php foreach ($rows as $row): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['fahrradNr']); ?></td>
                    <td><?php echo htmlspecialchars($row['rahmenNr']); ?></td>
                    <td><?php echo htmlspecialchars(number_format((float) $row['tagesmietpreis'], 2, ',', '.')); ?> €</td>
                    <td><?php echo htmlspecialchars($row['anschaffungsdatum']); ?></td>
                    <td><?php echo htmlspecialchars($row['artikelNr']); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</body>
</html>
