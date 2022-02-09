<?php

namespace app\controllers\admin;

use yii\web\Controller;

class UserController extends Controller
{

	public function actionIndex($id = null) 
	{
		return $this->render('index');
	}
}