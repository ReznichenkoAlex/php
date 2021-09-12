<?php
require_once './vendor/autoload.php';
require_once './config.php';

$transport = new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl');
    $transport->setUsername(EMAIL);
    $transport->setPassword(EMAIL_PASSWORD);

$mailer = new Swift_Mailer($transport);

$message = (new Swift_Message('Wonderful Subject'))
    ->setFrom(['server.Reznichenko@gmail.com' => 'server.Reznichenko@gmail.com'])
    ->setTo(['server.Reznichenko@gmail.com'])
    ->setBody('Here is the message itself')
    ->attach(Swift_Attachment::fromPath('composer.json'))
;


$result = $mailer->send($message);
var_dump($result);

