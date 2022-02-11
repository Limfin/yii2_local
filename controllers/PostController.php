<?php

namespace app\controllers;

use Yii;
// use yii\web\Controller;

use app\models\TestForm;
use app\models\Category;

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

		//выводит все записи
		// $cats = Category::find()->all();

		//сортировка выводимых данных из базы. SORT_ASC прямой порядок 1,2,3...10 
		// $cats = Category::find()->orderBy(['id' => SORT_ASC])->all();

		//сортировка выводимых данных из базы.  SORT_DESK обратный порядок 10,9,8...1
		// $cats = Category::find()->orderBy(['id' => SORT_DESC])->all();

		//вывод данных в виде массива
		// $cats = Category::find()->asArray()->all();

		//фильтрация выводимых данных. Есть несколько способов записи:
		// 1 - where('id=3'):
		// $cats = Category::find()->asArray()->where('id=3')->all();

		// 2- where(['id' => 4]):
		// $cats = Category::find()->asArray()->where(['id' => 4])->all();

		// 3- where(['like', 'login', 'am']): выберет все данные, согласно оператору в данном примере "like", где в поле "login" содержится слово "am"
		// $cats = Category::find()->asArray()->where(['like', 'login', 'am'])->all();

		// 3- where(['<=', 'id', '3']): выберет все данные, согласно оператору в данном примере "<=", где в поле "id" меньше или равно "3"
		// $cats = Category::find()->asArray()->where(['<=', 'id', '3'])->all();

		//вывод не всех записей, а только одну
		//первый способ:
		// $cats = Category::find()->asArray()->where(['<=', 'id', '3'])->limit(1)->all();
		//второй способ:
		// $cats = Category::find()->asArray()->where(['<=', 'id', '3'])->one();

		//подсчет количества записей
		// $cats = Category::find()->asArray()->where(['<=', 'id', '3'])->count();

		//использование метода findOne()
		// $cats = Category::findOne(['id' => 4]);

		//использование метода findAll()
		// $cats = Category::findAll(['id' => 4]);

		//создание своего sql запроса
		//в этом варианте может быть использована sql инъекция:
		// $query = "SELECT * FROM users WHERE login LIKE '%am%'";
		// $cats = Category::findBySql($query)->all();

		//лучше использовать такой вариант запроса:
		$query = "SELECT * FROM users WHERE login LIKE :search";
		$cats = Category::findBySql($query, [':search' => '%am%'])->all();








		return $this->render('show', [
			'cats' => $cats,
		]);
	}
}
