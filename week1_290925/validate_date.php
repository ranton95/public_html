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
    print($date_array);
    echo "</pre>";
    return true;
    // $d= DateTime::createFromFormat($format, $date);
    // return $d && $d
}

isValidDate($date)

?>

</body>
</html>