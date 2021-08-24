<?php

function task1($array, $flag = false)
{
    if ($flag) {
        return implode($array);
    }
    foreach ($array as $v) {
        echo "<p>" . $v . "</p>";
    }
}

function task2($sign, ...$numbers)
{
    $result = $numbers[0];
    $resultString = "Результат: " . $result . " " . $sign . " ";
    for ($i = 1; $i < sizeof($numbers); $i++){
        switch ($sign) {
            case "+":
                $result += $numbers[$i];
                break;
            case "-":
                $result -= $numbers[$i];
                break;
            case "*":
                $result *= $numbers[$i];
                break;
            case "/":
                $result /= $numbers[$i];
                break;
            default:
                echo "Введен неккоректный знак";
                return;
        }
        if ($i === sizeof($numbers) - 1) {
            $resultString .= $numbers[$i] . " ";
        } else {
            $resultString .= $numbers[$i] . " $sign ";
        }
    }
    $resultString .= " = " . $result;
    echo $resultString;
}

function task3(...$numbers)
{
    if (sizeof($numbers) !== 2) {
        echo "Введите 2 аргумента для функции";
        return;
    }
    echo "<table>";
    for ($i = 1; $i <= $numbers[0]; $i++) {
        echo "<tr>";
        for ($j = 1; $j <= $numbers[1]; $j++) {
            echo "<td align='center'>";
            echo $i * $j;
            echo "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

function task4()
{
    echo date("d.m.Y H:i") . "<br>";
}

function task5()
{
    echo date("d.m.Y H:i:s", time()) . "<br>";
}

function task6()
{
    $str = "Карл у Клары украл Кораллы<br>";
    echo str_replace("К", "", $str);
}

function task7()
{
    $str = "Две бутылки лимонада<br>";
    echo str_replace("Две", "Три", $str);
}

function task8()
{
    $fp = fopen('test.txt', 'a');
    file_put_contents('test.txt', 'Hello again!');
    fclose($fp);
    echo "task8 отработала<br>";
}

function task9($name)
{
    echo file_get_contents($name);
}

