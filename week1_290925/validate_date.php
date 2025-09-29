<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php 
//validate.php
// test at: http://localhost/~joseroyce/

$date = "29.02.2025";


function isValidDate(string $date, $format = "Y-m-d"): bool{
    $date_array = explode(".", $date);
    echo "<pre>";
    print_r($date_array);
    echo "</pre>";

    echo "<p>Tag: $date_array[0] <br>";
    echo "Monat: $date_array[1] <br>";
    echo "Jahr: $date_array[0] </p>";

    return true;
}

isValidDate($date)

?>

</body>
</html>