<?php

require_once __DIR__ . "/sensor.php";

$sensor = new Sensoren(12345, "PT100", 50, 1, "Digital");

echo $sensor->getDaten() . PHP_EOL;
echo $sensor->ausbuchen(20) . PHP_EOL;
echo $sensor->ausbuchen(50) . PHP_EOL;
