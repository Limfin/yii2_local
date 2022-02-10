<?php

namespace app\controllers;

use Yii;
// use yii\web\Controller;

use app\models\TestForm;

//отдельно импортировать AppController не нужно, как это делалось со стандартным контроллером (use yii\web\Controller;), т.к. он находится в одной папке с контроллером MyController
class PostController extends AppController
{

	//подключение шаблона basic для всего контроллера PostController
	public $layout = 'basic';
	//-------------------------->

	public function beforeAction($action)
	{

		if ($action->id == 'index') {
			$this->enableCsrfValidation = false; //отключение проверки csrf токена при отправке запроса методом post
		}
		return parent::beforeAction($action);
	}

	public function actionIndex()
	{

		if (Yii::$app->request->isAjax) {

			echo ('<pre>');
			print_r($_POST);

			return 'test';
		}

		$names = ['Ivanov', 'Petrov', 'sidorov'];

		// $this->debug($names);


		$model = new TestForm();

		//проверка что данные из формы загружены
		if ($model->load(Yii::$app->request->post())) {

			//проверка что данные провалидированы
			if ($model->validate()) {
				Yii::$app->session->setFlash('success', 'Данные приняты');

				// Перезагрузка формы после успешной отправки.
				return $this->refresh();
			} else {
				Yii::$app->session->setFlash('error', 'Ошибка');
			}
		}


		return $this->render('test', [
			'names' => $names,
			'model' => $model
		]);
	}

	public function actionShow()
	{
		//подключение шаблона basic для конкретного action
		// $this->layout = 'basic';
		//-------------------------->

		//добавление мета тега title для страницы show
		$this->view->title = 'Title внутри контроллера';

		//добавление мета тега keywords для страницы show
		$this->view->registerMetaTag(['name' => 'keywords', 'content' => 'ключевые слова заданные в PostController.php']);

		//добавление мета тега description для страницы show
		$this->view->registerMetaTag(['name' => 'descripton', 'content' => 'descripton заданный в PostController.php']);

		return $this->render('show');
	}
}
