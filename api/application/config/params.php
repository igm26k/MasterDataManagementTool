<?php

return [
    'adminEmail'     => 'i.golubev@igm26k.ru',
    'senderEmail'    => 'i.golubev@igm26k.ru',
    'senderName'     => 'Master Data Management Tool',
    'apiCorsOptions' => [
        'Origin'                           => ['http://localhost:8080'],//getenv('CORS_ORIGIN') ? [getenv('CORS_ORIGIN')] : [],
        'Access-Control-Request-Method'    => ['POST', 'OPTIONS'],
        'Access-Control-Request-Headers'   => ['*'],
        'Access-Control-Allow-Credentials' => false,
        'Access-Control-Max-Age'           => 86400,
    ],
];
