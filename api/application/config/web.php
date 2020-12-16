<?php

use yii\web\View;

$params = require __DIR__ . '/params.php';
$log = require __DIR__ . '/log.php';
$mongodb = require __DIR__ . '/mongodb.php';
$db = require __DIR__ . '/db.php';
$urlManager = require __DIR__ . '/urlManager.php';
$mailer = require __DIR__ . '/mailer.php';
$i18n = require __DIR__ . '/i18n.php';

$config = [
    'id'         => 'basic',
    'basePath'   => dirname(__DIR__),
    'bootstrap'  => ['log'],
    'language'   => 'ru',
    'aliases'    => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'assetManager' => [
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'jsOptions'  => ['position' => View::POS_HEAD],
                    'sourcePath' => null,
                    'basePath'   => '@webroot',
                    'baseUrl'    => '@web',
                    'js'         => ['js/jquery-3.4.1.min.js'],
                ],
            ],
        ],
        'authManager'  => [
            'class' => 'yii\rbac\DbManager',
        ],
        'request'      => [
            'baseUrl'             => '',
            'cookieValidationKey' => 'tFZhz5zNbQL7YlCBmo1PL5n8NFxvDFWm',
            'parsers'             => [
                'application/json' => 'yii\web\JsonParser',
            ],
        ],
//        'response' => [
//            'class' => 'app\api\ApiResponse'
//        ],
        'cache'        => [
            'class' => 'yii\caching\FileCache',
        ],
        'user'         => [
            'identityClass' => 'mdm\admin\models\User',
            'loginUrl'      => ['rbac/user/login'],
        ],
        'errorHandler' => [
            'class' => 'app\api\ApiErrorHandler'
        ],
        'mailer'       => $mailer,
        'log'          => $log,
        'mongodb'      => $mongodb,
        'db'           => $db,
        'urlManager'   => $urlManager,
        'i18n'         => $i18n,
    ],
    'params'     => $params,
    'modules'    => [
        'rbac' => [
            'class'         => 'mdm\admin\Module',
            'controllerMap' => [
                'assignment' => [
                    'class'         => 'mdm\admin\controllers\AssignmentController',
                    /* 'userClassName' => 'app\models\User', */
                    'idField'       => 'id',
                    'usernameField' => 'username',
                ],
            ],
            'layout'        => 'left-menu',
            'mainLayout'    => '@app/views/layouts/main.php',
        ],
    ],
    'as access'  => [
        'class'        => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            '*'
            //            'site/*',
            //            'admin/*',
            //            'rbac/*',
            //            'gii/*',
        ],
    ],
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class'      => 'yii\gii\Module',
        'allowedIPs' => ['*'],
        'generators' => [
            'mongoDbModel' => [
                'class' => 'yii\mongodb\gii\model\Generator',
            ],
        ],
    ];
}

return $config;
