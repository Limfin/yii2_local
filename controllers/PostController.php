<?php

namespace app\controllers;

// use yii\web\Controller;

//отдельно импортировать AppController не нужно, как это делалось со стандартным контроллером (use yii\web\Controller;), т.к. он находится в одной папке с контроллером MyController
class PostController extends AppController 
{

	public function actionTest() 
	{
		$names = ['Ivanov', 'Petrov', 'sidorov'];

		// $this->debug($names);

		return $this->render('test', [
			'names' => $names
		]);
	}
}