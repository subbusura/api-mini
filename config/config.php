<?php
return [
    'id' => 'api-app',
    // the basePath of the application will be the `micro-app` directory
    'basePath' => dirname(__DIR__),
    // this is where the application will find all controllers
    'controllerNamespace' => 'api\controllers',
    'bootstrap' => ['log'],
    'components'=>[
    	 	'request' => [
    				'parsers' => [
    						'application/json' => 'yii\web\JsonParser',
    				]
    		],
    		'response' => [
            'class' => 'yii\web\Response',
            'format' => yii\web\Response::FORMAT_JSON,
            'formatters' => [
      				'application/json' => yii\web\Response::FORMAT_JSON,
      				'application/xml' => yii\web\Response::FORMAT_XML,
      		],
      		'charset' => 'UTF-8',
            'on beforeSend' => function ($event) {

                $response = $event->sender;

                if ($response->data !== null) {

                    if($response->isSuccessful)

                    {

                        $response->data = [

                                'success' => $response->isSuccessful,

                                'data' => $response->data,

                                'statusCode'=>$response->statusCode,

                                'error'=>null

                        ];
 

                    }else{

                    
                        $response->data = [

                                'success' => $response->isSuccessful,

                                'data' =>null,

                                'statusCode'=>$response->statusCode,

                                'error'=> $response->data,

                        ];

                            

                        

                    }

                    $response->statusCode = 200;

                }

            },

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
    	'errorHandler' => [

    			'errorAction' => 'site/error',

    	],
    	 'db' => require(__DIR__ . '/db.php'),
    ],
    // set an alias to enable autoloading of classes from the 'micro' namespace
    'aliases' => [
        '@api' =>dirname(__DIR__),
    ],
    'params' =>require(__DIR__ . '/params.php'),
    'timeZone'=>'Asia/Kolkata'
];