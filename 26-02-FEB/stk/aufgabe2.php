<?php


$addressChange = [
    "addressaenderung" =>
    [
        "auftragsid" => 12345,
        "knr" => 20452,
        "auftragsdatum" => "2015-08-22T13:09:14",
        "addresseAlt" => [
            "name" => "Hans Winter",
            "strasse" => "Muehlgasse",
            "ort" => "Bergheim",
            "ply" => 12345
        ],
        "addressenNeu" => [
            "name" => "Hans Winter",
            "strasse" => "Rosenweg 55",
            "ort" => "Talheim",
            "ply" => 54321
        ],
    ],
];

$output = json_encode($addressChange, JSON_PRETTY_PRINT);

echo $output;

?>