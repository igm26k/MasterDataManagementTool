<?php

use KebaCorp\VaultSecret\VaultSecret;

$host = VaultSecret::getSecret('MYSQL_DB_HOST', 'mariadb');
$name = VaultSecret::getSecret('MYSQL_DB_NAME', 'MDMTool');
$user = VaultSecret::getSecret('MYSQL_DB_USER', 'root');
$pass = VaultSecret::getSecret('MYSQL_DB_PASS', 'root');

return [
    'class'    => 'yii\db\Connection',
    'dsn'      => "mysql:host={$host};dbname={$name}",
    'username' => $user,
    'password' => $pass,
    'charset'  => 'utf8mb4',
];
