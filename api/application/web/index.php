<?php

use KebaCorp\VaultSecret\VaultSecret;

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';

VaultSecret::load(__DIR__ . '/../../secrets.json', [
    'saveTemplate'         => true,
    'saveTemplateFilename' => __DIR__ . '/../../secrets.example.json',
]);

$config = require __DIR__ . '/../config/web.php';

(new yii\web\Application($config))->run();
