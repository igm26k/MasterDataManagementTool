<?php

use app\helpers\Env;
use KebaCorp\VaultSecret\VaultSecret;

require __DIR__ . '/../helpers/Env.php';

$host = VaultSecret::getSecret('MONGO_DB_HOST', 'mongo');
$name = VaultSecret::getSecret('MONGO_DB_NAME', 'MDMToolMongo');
$user = VaultSecret::getSecret('MONGO_DB_USER', 'MDMToolMongo');
$pass = VaultSecret::getSecret('MONGO_DB_PASS', 'MDMToolMongo');

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