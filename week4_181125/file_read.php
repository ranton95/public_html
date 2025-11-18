<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

$file = "person.csv";
if(!file_exists($file)){
    die("File $file does not exist or not found!");
}

$fp = fopen($file, "r");

if(!$fp){
    die('Error while opening file!');
}

//Kopfzeile auslesen und in Array umwandeln (1x -> Pointer geht auf Zeile 2)
$header_array = fgetcsv($fp);

//$header_array = fgetcsv($fp);


// // umständlich:
// $header_array = fgets($fp);
// $header_array = explode(",", $header);


echo "<prev>";
print_r($header_array);
echo "</prev>";

//Äußere Schleife: Zeilen auslesen
while(!feof($fp)){
    $row_array = fgetcsv($fp);
    // echo "<prev>";
    // print_r($header_array);
    // echo "</prev>";

    for($i = 0; $i < count($row_array); $i++ ){
        echo "$header_array[$i] : $row_array[$i]<br>";
    }

}






?>
</body>
</html>