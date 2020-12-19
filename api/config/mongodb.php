<?php

use app\helpers\Env;

require_once __DIR__ . '/../helpers/Env.php';

$host = Env::get('MONGO_DB_HOST', 'mongo');
$name = Env::get('MONGO_DB_NAME', 'MDMToolMongo');
$user = Env::get('MONGO_DB_USER', 'MDMToolMongo');
$pass = Env::get('MONGO_DB_PASSWORD', 'MDMToolMongo');

$config = [
    'class'   => '\yii\mongodb\Connection',
    'dsn'     => "mongodb://{$host}/{$name}",
    'options' => [
        "username" => $user,
        "password" => $pass,
    ],
];
$replicaSet = Env::get("MONGO_DB_REPLICASET", '');
$authSource = Env::get('MONGO_DB_AUTHSOURCE', '');
$readPreference = Env::get('MONGO_DB_READPREFERENCE', '');
$w = Env::get('MONGO_DB_W', '');

if (!empty($readPreference)) {
    $config['driverOptions']['readPreference'] = $readPreference;
}

if (!empty($w)) {
    $config['driverOptions']['w'] = $w;
}

if (!empty($replicaSet)) {
    $dsnParams[] = "replicaSet={$replicaSet}";
}

if (!empty($authSource)) {
    $dsnParams[] = "authSource={$authSource}";
}

if (!empty($dsnParams)) {
    $config['dsn'] = "{$config['dsn']}?" . implode('&', $dsnParams);
}

return $config;