<?php
// Задача 1
$name = 'Алексей';
$age = '21';
echo "Меня зовут $name<br>";
echo "Мне $age лет<br>";
echo "\"!|/'\"\<br>";

// Задача 2
echo "На школьной выставке 80 рисунков. 23 из них выполнены фломастерами, 40 карандашами, а остальные — красками. Сколько рисунков, выполненные красками, на школьной выставке?<br>";
const DRAWINGS = 80;
const MARKERS = 23;
const PENCILS = 40;
const PAINTS = DRAWINGS - MARKERS - PENCILS;
echo "Для решения задачи нужно отнять от общего количества рисунков(" . DRAWINGS . ") колличество рисунков нарисованных с помощью фломастеров (" . MARKERS . ") и карандашей (" . PENCILS . ")<br>";
echo "В итоге получим " . PAINTS . " рисунков, нарисованных с помощью красок<br>";

// Задача 3
$age = 12;
if ($age >= 18 && $age <= 65) {
    echo "Вам ещё работать и работать<br>";
} elseif ($age >= 65) {
    echo "Вам пора на пенсию<br>";
} elseif ($age >= 1 && $age <= 17) {
    echo "Вам ещё рано работать<br>";
} else {
    echo "Неизвестный возраст<br>";
}

// Задача 4
$day = 6;
switch ($day){
    case 1:
        echo "Это рабочий день";
        break;
    case 2:
        echo "Это рабочий день";
        break;
    case 3:
        echo "Это рабочий день";
        break;
    case 4:
        echo "Это рабочий день";
        break;
    case 5:
        echo "Это рабочий день";
        break;
    case 6:
        echo "Это выходной день";
        break;
    case 7:
        echo "Это выходной день";
        break;
    default:
        echo "Неизвестный день";
}

// Задача 5
$bmw = ["model" => "X5", "speed" => 120, "doors" => 5, "year" => "2015"];
$toyota = ["model" => "prius", "speed" => 130, "doors" => 5, "year" => "2018"];
$opel = ["model" => "coarse", "speed" => 80, "doors" => 3, "year" => "2010"];
$cars = ["bmw" => $bmw, "toyota" => $toyota, "opel" => $opel];


foreach ($cars as $k => $v) {
    echo "CAR $k<br>";
    foreach ($v as $value){
        echo "$value ";
    }
    echo "<br>";
}

// Задача 6
echo "<table  bordercolor='blue' bgcolor='#b00baa'  border='3' >";
for ($i = 1; $i < 11; $i++) {
    echo "<tr>";
    for ($j = 1; $j < 11; $j++) {
        echo "<td align='center'>";
        if ($i % 2 === 0 && $j % 2 === 0) {
            echo "(" . $i * $j . ")";
        } elseif ($i % 2 !== 0 && $j % 2 !== 0) {
            echo "[" . $i * $j . "] ";
        } else {
            echo $i * $j;
        }
        echo "</td>";
    }
    echo "</tr>";
}
echo "</table>";
