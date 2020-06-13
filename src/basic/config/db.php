<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => "mysql:host=".$_ENV['DB_HOST'].";dbname=".$_ENV['DB_DATABASE'],
    'username' => 'root',
    'password' => $_ENV['DB_PASSWORD'],
    'charset' => 'utf8',

];
// return [
//     'class' => 'yii\db\Connection',
//     'dsn' => "mysql:host=localhost;dbname=histclin",
//     'username' => 'root',
//     'password' => "padi",
//     'charset' => 'utf8',

// ];
