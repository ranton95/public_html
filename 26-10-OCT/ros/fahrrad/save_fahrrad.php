<?php
require __DIR__ . '/config.php';

$errors = [];

$rahmenNr = trim($_POST['rahmenNr'] ?? '');
$preisText = trim($_POST['tagesmietpreis'] ?? '');
$datum = trim($_POST['anschaffungsdatum'] ?? '');
$artikelNr = trim($_POST['artikelNr'] ?? '');

if ($rahmenNr === '' || strlen($rahmenNr) > 6) {
    $errors[] = 'Die Rahmennummer muss zwischen 1 und 6 Zeichen lang sein.';
}

$preis = str_replace(',', '.', $preisText);
if ($preis === '' || !is_numeric($preis)) {
    $errors[] = 'Bitte geben Sie einen gültigen Preis ein.';
}

if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $datum)) {
    $errors[] = 'Bitte geben Sie das Datum im Format JJJJ-MM-TT ein.';
} else {
    $d = DateTime::createFromFormat('Y-m-d', $datum);
    if (!$d || $d->format('Y-m-d') !== $datum) {
        $errors[] = 'Das Datum ist ungültig.';
    }
}

if ($artikelNr === '' || !ctype_digit((string) $artikelNr)) {
    $errors[] = 'Die Artikelnummer muss eine ganze Zahl sein.';
}

if ($errors) {
    header('Location: index.php?error=' . urlencode(implode(' | ', $errors)));
    exit;
}

try {
    $pdo = getPdo();
    $stmt = $pdo->prepare('INSERT INTO fahrraeder (rahmenNr, tagesmietpreis, anschaffungsdatum, artikelNr) VALUES (:rahmenNr, :preis, :datum, :artikelNr)');
    $stmt->execute([
        ':rahmenNr' => $rahmenNr,
        ':preis' => (float) $preis,
        ':datum' => $datum,
        ':artikelNr' => (int) $artikelNr,
    ]);

    header('Location: index.php?success=1');
    exit;
} catch (Throwable $e) {
    header('Location: index.php?error=' . urlencode('Speichern fehlgeschlagen: ' . $e->getMessage()));
    exit;
}
