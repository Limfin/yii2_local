<?php

namespace app\controllers\admin;

// use yii\web\Controller;

//здесь нужно отдельно импортировать AppController, т.к. он находится не в одной папке с контроллером UserController, а внутри своей папки - admin
use app\controllers\AppController;

class UserController extends AppController
{

	public function actionIndex($id = null) 
	{
		return $this->render('index');
	}
}