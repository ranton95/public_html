<?php

// To-do: check with other sources
// Vignere Funktion
function vigenere($text, $code) {
    
    for($i = 0; $i < strlen($text); $i++){
        $shift = $code[$i % strlen($code) -1];

        $letter = $text[$i];
        $letter = ord($letter);

        if($letter >= 65 && $letter <= 90){
            $result .= chr( ($letter - 65 + $shift) %26 +65);
        }
        elseif($letter >= 97 && $letter <= 122){
            $result .= chr( ($letter - 97 + $shift) %26 + 97);
        }
        else{
            $result .= chr($letter);
        }
    }
    return $result;
}

// Formularverarbeitung
$output = "";
$text = "";
$shift = 0;
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $text = $_POST["text"] ?? "";
    $shift = $_POST["shift"];

    if (isset($_POST["encrypt"])) {
        $output = vigenere($text, $shift);
    }

    if (isset($_POST["decrypt"])) {
        $output = caesar($text, -$shift);
    }
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>vigenere</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            padding: 30px;
        }
        .box {
            background: white;
            padding: 20px;
            max-width: 500px;
            margin: auto;
            border-radius: 8px;
        }
        textarea, input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
        }
        button {
            padding: 10px 20px;
            margin-right: 10px;
        }
        label{
            display: block;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="box">
    <h2>vigenere</h2>

    <form method="post">
        <label for="text">Nachricht:</label>
        <textarea name="text" rows="4"><?= htmlspecialchars($text) ?></textarea>

        <label>Verschiebung:</label>
        <input type="number" name="shift" value="<?= htmlspecialchars($shift) ?>">
        <!--<input type="number" name="shift" value="<?= htmlspecialchars($shift) ?>">-->

        <button type="submit" name="encrypt">Verschlüsseln</button>
        <button type="submit" name="decrypt">Entschlüsseln</button>

        <label for="result"> Verschlüsselte Nachricht:</label>
        <textarea name="result" rows="4" readonly><?= htmlspecialchars($output ?: $text) ?></textarea>
    </form>
</div>

</body>
</html>