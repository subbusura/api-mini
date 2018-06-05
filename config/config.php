<?php
$config= [
    'id' => 'api-app',
    // the basePath of the application will be the `micro-app` directory
    'basePath' => dirname(__DIR__),
    // this is where the application will find all controllers
    'controllerNamespace' => 'api\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'v1' => [   
                'class' => 'api\modules\v1\Module',
            ]
],
    'components'=>[
    	 	'request' => [
    				'parsers' => [
    						'application/json' => 'yii\web\JsonParser',
    				],
                   'cookieValidationKey' => 'heloow',
    		],
         'user' => [
        		'identityClass' => 'api\models\User',
        		'enableAutoLogin' => false,
        		'enableSession' =>false,
        		'loginUrl'=>null
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ]
            ],
        ],
        'urlManager' => [
        		'enablePrettyUrl' => true,
        		'enableStrictParsing' => false,
        		'showScriptName' => false,
        		'rules' => [
        				//['class' => 'yii\rest\UrlRule', 'controller' => 'site/index'],
                    'debug/<controller>/<action>' => 'debug/<controller>/<action>',
        	  ],
        ],
    	'errorHandler' => [
    			'errorAction' => 'site/error',
    	],
    	 'db' => require(__DIR__ . '/db.php'),
    ],
    // set an alias to enable autoloading of classes from the 'micro' namespace
    'aliases' => [
        '@api' =>dirname(__DIR__),
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'params' =>require(__DIR__ . '/params.php'),
    'timeZone'=>'Asia/Kolkata'
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
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
