<?php
require_once './lib/validation.php';
require_once './lib/class.db.php';

if (!empty($_REQUEST)) {
    $db = Db::getInstance();
    $valid = validation($_REQUEST['name'], $_REQUEST['email'], $_REQUEST['phone'], $_REQUEST['street'],
        $_REQUEST['home'], $_REQUEST['appt']);
    if ($valid && ($secure = 1)) {
        $user = $db->fetch("SELECT id FROM users WHERE email = :input_email", ['input_email' => $_REQUEST['email']]);
        /
        $address = 'Улица ' . $_REQUEST['street'] . ' д.' . $_REQUEST['home'] . ' корпус ' . $_REQUEST['part'] . ' кв.' . $_REQUEST['appt'] . ' этаж ' . $_REQUEST['floor'];
        if (empty($user['id'])) {
            $db->exec("INSERT INTO users (email, tel) VALUES (:input_email, :input_tel)",
                ['input_email' => $_REQUEST['email'], 'input_tel' => $_REQUEST['phone']]);
            $user = $db->fetch("SELECT id FROM users WHERE email = :input_email",
                ['input_email' => $_REQUEST['email']]);
        } else {
            $db->exec("UPDATE users SET numberOfOrders= numberOfOrders + 1 WHERE id= :user_id",
                ['user_id' => $user['id']]);
        }
        $db->exec("INSERT INTO orders (user_id,address,name,comment,payback,callback) VALUES (:user_id, :input_address, :input_name, :input_comment, :input_payback, :input_callback)",
            [
                'user_id' => $user['id'],
                'input_address' => $address,
                'input_name' => $_REQUEST['name'],
                'input_comment' => $_REQUEST['comment'],
                'input_payback' => $_REQUEST['payment'],
                'input_callback' => $_REQUEST['callback']
            ]);
        $details = $db->fetch("select users.numberOfOrders, orders.id from burgers.users, burgers.orders where orders.user_id = users.id and burgers.users.id = :user_id order by id desc limit 1",
            ['user_id' => $user['id']]);
        echo "Спасибо, ваш заказ будет доставлен по адресу: " . $address . "<br> Номер вашего заказа: #" . $details['id'] . "<br>Это ваш " . $details['numberOfOrders'] . "й заказ!<br>";
    }
} else {
    echo file_get_contents('../index/index.html');
}
