<?php
return [
    'class'     => 'yii\swiftmailer\Mailer',
    'transport' => [
        'class' => 'Swift_SmtpTransport',
        'host'  => 'smtp.yandex.ru',
        'port'  => '25',
    ],
];