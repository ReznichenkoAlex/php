<?php
$users = [];
$names = ['Маша', 'Миша', 'Женя', 'Вика', 'Коля'];
for ($i = 0; $i < 50; $i++) {
    $users[] = ['id' => $i, 'name' => $names[mt_rand(0, 4)], 'age' => mt_rand(18, 45)];
}

$usersJson = json_encode($users);

$fp = fopen('./users.json', 'w+');

file_put_contents('./users.json', $usersJson);

$array = json_decode(file_get_contents('./users.json'), true);

foreach ($names as $v) {
    $result = 0;
    for ($i = 0; $i < sizeof($array); $i++) {
        if ($array[$i]['name'] === $v) {
            $result += 1;
        }
    }
    echo $v . " - " . $result . "<br>";
}

$sum = 0;
for ($i = 0; $i < sizeof($array); $i++) {
    $sum += $array[$i]['age'];
}
$mean = $sum / sizeof($array);
echo "Среднее равно " . $mean . "<br>";