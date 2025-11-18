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


$header_array = fgetcsv($fp);
// $header_array = explode(",", $header);
echo "<prev>";
print_r($header_array);
echo "</prev>";

?>
</body>
</html>