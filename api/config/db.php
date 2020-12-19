<?php

use app\helpers\Env;

require_once __DIR__ . '/../helpers/Env.php';

$host = Env::get('MYSQL_DB_HOST', 'mariadb');
$name = Env::get('MYSQL_DB_NAME', 'MDMTool');
$user = Env::get('MYSQL_DB_USER', 'root');
$pass = Env::get('MYSQL_DB_PASS', 'root');

return [
    'class'    => 'yii\db\Connection',
    'dsn'      => "mysql:host={$host};dbname={$name}",
    'username' => $user,
    'password' => $pass,
    'charset'  => 'utf8mb4',
];
