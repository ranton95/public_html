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

function isLeapYear(int $year): bool{
    return (( $year % 4 == 0 && $year % 100 != 0) || $year % 400 == 0);
    // if( ( $year % 4 == 0 && $year % 100 != 0) || $year % 400 == 0){
    //     return true;
    // }
    // return false;


}


function isValidDate(string $date, $format = "Y-m-d"): bool{
    // $date_parts = ['Tag', 'Monat', 'Jahr'];
    // $date_array = explode(".", $date);
    
    // //geht nicht:
    // echo $date_array;
    
    // // Ausgabe des Arrays zum Debuggen
    // echo "<pre>";
    // print_r($date_array);
    // echo "</pre>";

    // // Benutzerfreundliche Ausgabe
    // echo "<p>Tag: $date_array[0] <br>";
    // echo "Monat: $date_array[1] <br>";
    // echo "Jahr: $date_array[0] </p>";

    // for($i = 0 ; $i < sizeof($date_array); $i++){
    //     echo "<p> $date_array[$i]: $date_array[$i] </p>";
    // }


    // Can be simply written as:
    $date_parts = ['Tag', 'Monat', 'Jahr'];
    $date_array = explode(".", $date);
    $days_of_month = [31,28,31,30,31,30,31,31,30,31,30,31];

    if(isLeapYear($date_array[2])){
        $days_of_month[1]=29;
    }

    $date_array_assoz = array_combine($date_parts, $date_array) ;
    print_r($date_array_assoz);

    echo gettype($date_parts[2]);

    foreach( $date_array_assoz as $date_partkey => $datepartvalue){
        echo "<p> $date_partkey : $datepartvalue </p>";
    }

    // Tag auf Gültigkeit prüfen
    if($date_array[0] >= 1 && $date_array[0] <= $days_of_month[$date_array[1]-1]){
        echo "<p> Tage False</p>";
        return false;
    }else{
        echo "<p> Tage Correct</p>";
    }

    // Monat auf Gültigkeit prüfen
    if($date_array[1] < 1 || $date_array[1]>12){
        echo "<p> Tage Wow 1</p>";
        return false;
    }

    // Jahr auf Gültigkeit prufen
    if($date_array[2] < 0 || $date_array[2]>3000){
        echo "<p> Tage Wow 2</p>";
        return false;
    }
    


    return true;

}

isValidDate($date)

?>

</body>
</html>