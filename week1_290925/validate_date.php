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
    $date_array_assoz = array_combine($date_parts, $date_array) ;
    print_r($date_array_assoz);

    foreach( $date_array_assoz as $date_partkey => $datepartvalue){
        echo "<p> $date_partkey : $datepartvalue </p>";
    }

    if($date_array [0] <= $days_of_month[$date_array[1]]-1){
        
    }



    return true;

}

isValidDate($date)

?>

</body>
</html>