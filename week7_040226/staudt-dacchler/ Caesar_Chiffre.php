<?php


// Caesar-Chiffre Funktion
function caesar($text, $shift) {
    for($i = 0; $i < strlen($text); $i++){
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
    
/*

Hier Code ergaenzen


*/
    // $result = " ";
    // $shift = intval($)

    // $characters = str_split($text);

    // foreach( $character as $characters ){
    //     $ascii_wert = ord($character);


    // }
    

    return $result;
}

// Formularverarbeitung
$output = "";
$text = "";
$shift = 0;
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $text = $_POST["text"] ?? "";
    $shift = intval($_POST["shift"] ?? 0);

    if (isset($_POST["encrypt"])) {
        $output = caesar($text, $shift);
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
    <title>Caesar Chiffre</title>
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
    <h2>Caesar Chiffre</h2>

    <form method="post">
        <label for="text">Nachricht:</label>
        <textarea name="text" rows="4"><?= htmlspecialchars($text) ?></textarea>

        <label>Verschiebung:</label>
        <input type="number" name="shift" min = 1 max = 26 value="<?= htmlspecialchars($shift) ?>">
        <!--<input type="number" name="shift" value="<?= htmlspecialchars($shift) ?>">-->

        <button type="submit" name="encrypt">Verschlüsseln</button>
        <button type="submit" name="decrypt">Entschlüsseln</button>

        <label for="result"> Verschlüsselte Nachricht:</label>
        <textarea name="result" rows="4" readonly><?= htmlspecialchars($output ?: $text) ?></textarea>
    </form>
</div>

</body>
</html>