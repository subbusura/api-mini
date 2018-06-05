<?php

namespace api\modules\v1\controllers;

use yii;
use yii\rest\Controller;
use yii\filters\AccessControl;
/**
 * Default controller for the `api` module
 */
class DefaultController extends Controller
{

    /**
     * Renders the index view for the module
     * @return string
     */
	protected function verbs(){
	
		return [
				'index' => ['GET','HEAD'],
				'view' => ['GET', 'HEAD'],
				'create' => ['POST'],
				'update' => ['PUT', 'PATCH'],
				'delete' => ['DELETE'],
		];
	
	}
	
	
    public function actionIndex()
    {
    	
        return ['default controller'];
       
    }
}
