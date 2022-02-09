<?php

namespace app\controllers;

// use yii\web\Controller;

//отдельно импортировать AppController не нужно, как это делалось со стандартным контроллером (use yii\web\Controller;), т.к. он находится в одной папке с контроллером MyController
class MyController extends AppController 
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

	public function actionBlogPost()
	{
		// my/blog-post вызов action в названии которого больше одного слова
		return 'Blog Post';
	}
}
