<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';
$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['debug'],


    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'uIfAKZuEhg6_qsfBdQKWeigOxlsJuXBA',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
//        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
//            'class' => 'yii\rest\UrlManager',
            'rules' => [
//                '<controller>/<action>' => '<controller>/<action>'
                ['class' => 'yii\rest\UrlRule', 'controller' => 'customer'],
                'customer/view/<id>' => 'customer/view',
                'customer/delete/<id>' => 'customer/delete',
                'customer/update/<id>' => 'customer/update',
                'customer/create' => 'customer/create',

            ],
        ],
        'elasticsearch' => [
            'class' => 'yii\elasticsearch\Connection',
            'nodes' => [
                ['http_address' => '127.0.0.1:9200'],
                // configure more hosts if you have a cluster
            ],
            'auth' => [
                'username' => 'username',
                'password' => 'password',
            ],
            // set autodetectCluster to false if you don't want to auto detect nodes
            'autodetectCluster' => false,
            'dslVersion' => 7, // default is 5
        ],

    ],
    'params' => $params,
];

if (YII_ENV_DEV || true) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\\debug\\Module',
        'panels' => [
            'elasticsearch' => [
                'class' => 'yii\\elasticsearch\\DebugPanel',
            ],
        ],

    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

}

return $config;
