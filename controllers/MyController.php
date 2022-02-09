<?php

namespace app\controllers;

use yii\web\Controller;

class MyController extends Controller
{

	public function actionIndex($id = null) // $id передается в строке браузера через get параметр, например http://yii2.local/web/index.php?r=my&id=5
	{
		$hi = 'Hello, world!';
		$names = ['Ivanov', 'Petrov', 'sidorov'];
		return $this->render('index', [
			'hello' => $hi,
			'names' => $names,
			'id'    => $id
		]);
	}
}
