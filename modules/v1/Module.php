<?php

namespace api\modules\v1;

use yii;
use yii\web\Response;

/**
 * api module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'api\modules\v1\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        
        $this->registerComponent();
        
         if(Yii::$app->user->isGuest)
         {
         	Yii::$app->user->enableSession=false;
         	Yii::$app->user->enableAutoLogin=false;
         	Yii::$app->user->loginUrl=null;
         	$token=Yii::$app->request->get("token","");
         	
         	
         	
         }
         
         
         
       // \Yii::configure($this, require __DIR__ . '/config/config.php');
        // custom initialization code goes here
    }
    
    private function registerComponent(){
    	
    	 Yii::$app->setComponents([
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
    	 				]
    	 ]);
    	
    }
}
