<?php

//$params = require(__DIR__ . '/params.php');
//$db = require(__DIR__ . '/db.php');

$config = [
    'id' => 'api-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'api\commands',
    'components' => [
    	'authManager' => [
    				 
    				'class' => 'yii\rbac\DbManager',
    		],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        //'db' => $db,
    ],
    //'params' => $params,
		
    'controllerMap' => [
    	'migrate-rbac' => [
    		'class' => 'yii\console\controllers\MigrateController',
    		'migrationPath' => '@yii/rbac/migrations',
    		'migrationTable' => 'migration_rbac',
    	],
    ],
    
];



return $config;
