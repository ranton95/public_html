<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php

use Dom\Attr;

$file = "testfile.txt";
$fp = fopen($file, "w" );

if(!$fp){
    die('Cannot open the file');
}

// insert one row
$row = "This is a rowza \n";

if(!fputs($fp, $row)){
    echo "Error on writing";
}else{
    echo "Omg...writing successful";
}


// insert from an array
$myArray = [
    "firstname" => "Royce",
    "lastname" => "Jose",
    "email" => "wow@wow.com"

];

foreach($myArray as $attr => $value) {
    $row = "$attr: $value\n" ;
    fputs($fp, $row);
}




?>


</body>
</html>