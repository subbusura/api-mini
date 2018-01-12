<?php

namespace api\controllers;

use yii;
use yii\rest\Controller;

class SiteController extends Controller
{
    public function actionIndex()
    {
        return ['Hello World!'];
    }

    public function actionTest(){


    	return Yii::$app->params['admin'];

    }
    public function actionError(){
           
         
    		return "This is Default Error Action";

    }
}
