<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
	'id' => 'basic',
	//назначение глобальной переменной. далее ее можно вызывать в коде с помощью - Yii::$app->name
	'name' => 'Мой Сайт',
	'basePath' => dirname(__DIR__),
	'bootstrap' => ['log'],
	'language' => 'ru',
	// глобальное указание шаблона для всех страниц сайта
	// 'layout' => 'basic',
	//------------------->
	'aliases' => [
		'@bower' => '@vendor/bower-asset',
		'@npm'   => '@vendor/npm-asset',
	],
	'components' => [
		'request' => [
			// !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
			'cookieValidationKey' => '47zu1-0sMr0N4M8Ao-_1KKH9SOqL2aGg',
			'baseUrl' => '',
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
			// 'useFileTransport' to false and configure transport
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
		'db' => $db,

		//настройка ЧПУ
		'urlManager' => [
			'enablePrettyUrl' => true,
			'showScriptName' => false,

			//добавляет заданное значение к урлу, в данном случае добавить: '.html'
			'suffix' => '.html',
			'rules' => [

				//определение правил в виде массива
				[
					'pattern' => '',
					'route' => 'site/index',
					'suffix' => '',
				],

				'post' => 'post/index',
				'article' => 'post/show',

				//можно перечислить все правила
				// 'about' => 'site/about',
				// 'contact' => 'site/contact',
				// 'login' => 'site/login',

				// или можно использовать регулярное выражение, которое сокращает три верхних записи в одну
				// '<action:(about|contact|login)>' => 'site/<action>',

				//либо можно еще сократить. "\w+" - означает что может использоваться любое значение в action
				'<action:\w+>' => 'site/<action>',

			],
		],

	],
	'params' => $params,
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
