<?php
return [
    'traceLevel'    => YII_DEBUG ? 3 : 0,
    'flushInterval' => 1,
    'targets'       => [
        [
            'class'          => 'yii\log\FileTarget',
            'levels'         => ['error', 'warning'],
            'logFile'        => __DIR__ . '/../../logs/' . date('Ymd') . '/errors.log',
            'exportInterval' => 1,
            'logVars'        => [],
        ],
    ],
];
