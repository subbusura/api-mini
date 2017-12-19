<?php

if(YII_ENV_DEV=='dev'){

	return [
			'class' => 'yii\db\Connection',
			'dsn' => 'mysql:host=localhost;dbname=',
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
	];


}else{

	
	return [
			'class'=>'yii\db\Connection',
			'dsn'=>'mysql:host=localhost;dbname=',
			'username'=>'',
			'password'=>'',
			'charset'=> 'utf8',
			'enableSchemaCache' => true,
			'on afterOpen' => function($event) {
	
			$event->sender->createCommand("SET time_zone='+05:30';")->execute();
	
		 },
		 ];
	
}