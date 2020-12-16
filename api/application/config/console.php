<?php

$params = require __DIR__ . '/params.php';
$mongodb = require __DIR__ . '/mongodb.php';
$db = require __DIR__ . '/db.php';
$log = require __DIR__ . '/log.php';
$mailer = require __DIR__ . '/mailer.php';
$i18n = require __DIR__ . '/i18n.php';

$config = [
    'id'                  => 'basic-console',
    'basePath'            => dirname(__DIR__),
    'bootstrap'           => ['log'],
    'controllerNamespace' => 'app\commands',
    'aliases'             => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
        '@tests' => '@app/tests',
    ],
    'components'          => [
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'cache'       => [
            'class' => 'yii\caching\FileCache',
        ],
        'mailer'      => $mailer,
        'log'         => $log,
        'mongodb'     => $mongodb,
        'db'          => $db,
        'i18n'        => $i18n,
    ],
    'params'              => $params,
    'controllerMap'       => [
        /*'fixture' => [ // Fixture generation command line.
            'class' => 'yii\faker\FixtureController',
        ],*/
        'migrate-mysql' => [
            'class'         => 'yii\console\controllers\MigrateController',
            'migrationPath' => '@app/migrations/mysql',
        ],
        'migrate-mongo' => [
            'class'         => 'yii\mongodb\console\controllers\MigrateController',
            'migrationPath' => '@app/migrations/mongo',
        ],
    ],
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
