<?php
require_once './lib/tariffInterface.php';
require_once './lib/serviceInterface.php';
require_once './lib/tariffAbstract.php';
require_once './lib/baseTariff.php';
require_once './lib/hourTariff.php';
require_once './lib/studentTariff.php';
require_once './lib/serviceDriver.php';
require_once './lib/serviceGPS.php';

$base = new baseTariff(60, 100);
$hour = new hourTariff(123, 3);
$student = new studentTariff(381, 150);
$base->addService(new serviceGPS());
$hour->addService(new serviceDriver());
$student->addService(new serviceDriver());
$student->addService(new serviceGPS());
echo $base->calculatePrice();
echo "<br>";
echo $hour->calculatePrice();
echo "<br>";
echo $student->calculatePrice();