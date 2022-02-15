<?php

namespace app\components;

use yii\base\Widget;

class MyWidget extends Widget
{

	//объявление параметров для передачи в виджет
	public $name;

	public function init()
	{
		//обязательно выполняется родительский метод и после него уже можно делать необходимые проверки
		parent::init();
		// --------------------------- //

		//проверяется задано ли значение для свойства name и если не задано, то задается значение по умолчанию
		if ($this->name === null) {
			$this->name = 'Гость';
		}

		//буферизируем весь пользовательский контент, который указан в виде - show.php, между строками "MyWidget::begin()" и "MyWidget::end()"
		ob_start();
	}

	public function run()
	{
		//вывод информации напрямую без использования вида
		// return '<h1>' . $this->name . ', Hello, MyWidget!</h1>';


		//помещаем весь буферизированный вывод в переменную $content
		$content = ob_get_clean();
		//приводим весь контент в верхний регистр
		$content = mb_strtoupper($content);

		//вывод информации напрямую с помощью вида, вид находится там же где и виджет в папке \components\views
		return $this->render('my', [
			'name' => $this->name,
			'content' => $content,
		]);
	}
}
