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

$date = "29.02.3025";
if(isValidDate($date)){
    echo "<p>Datum $date is Valid</p>";
}else{
    echo "<p>Datum $date is Invalid</p>";
}

function isLeapYear(int $year): bool{
    return (( $year % 4 == 0 && $year % 100 != 0) || $year % 400 == 0);
}

function isValidDate(string $date): bool{
    $date_array = explode(".", $date);
    $days_of_month = [31,28,31,30,31,30,31,31,30,31,30,31];

    if(isLeapYear($date_array[2])){
        $days_of_month[1]=29;
    }

    // Tag auf Gültigkeit prüfen
    if($date_array[0] >= 1 && $date_array[0] <= $days_of_month[$date_array[1]-1]){
        return false;
    }

    // Monat auf Gültigkeit prüfen
    if($date_array[1] < 1 || $date_array[1]>12){
        return false;
    }

    // Jahr auf Gültigkeit prufen
    if($date_array[2] < 0 || $date_array[2]>3000){
        return false;
    }

    return true;

}

isValidDate($date)

?>

</body>
</html>