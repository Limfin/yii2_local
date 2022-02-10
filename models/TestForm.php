<?php

namespace app\models;

use yii\base\Model;

class TestForm extends Model
{

	public $name;
	public $email;
	public $text;

	public function attributeLabels() {
		return [
			'name' => 'Имя',
			'email' => 'E-mail',
			'text' => 'Текст сообщения',
		];
	}

	public function rules() {
		return [
			//можно по отдельности к каждому инпуту задавать правила валидации либо можно перечислить инпуты в массиве - [['name', 'email'], 'required'],
			['name', 'required', 'message' => 'Поле обязательно'],
			['email', 'required'],

			//валидалия на то что введен email
			['email', 'email'],
			//валидация на минимальное количество символов. tooShort используется вместо message для атрибута min
			['name', 'string', 'min' => 2, 'tooShort' => 'Слишком коротко'],
			//валидация на минимальное количество символов. tooLong используется вместо message для атрибута max
			['name', 'string', 'max' => 5, 'tooLong' => 'Слишком длинно'],
			//если стандартное сообщение подписи об ошибке не нужно менять то можно сразу указать минимально и максимальное количество символов
			// ['name', 'string', 'length' => [2,10]],

			//кастомный валидатор myRule, он срабатывает только на сервере. На клиенте(в браузере ошибка не отобразится)
			['name', 'myRule'],

			//фильтр trim удаляет пробелы в начале и конце сообщения
			['text', 'trim'],
		];
	}

	//описание функции кастомного валидатора myRule. он срабатывает только на сервере. На клиенте(в браузере ошибка не отобразится)
	public function myRule($attr) {
		if(!in_array($this->$attr, ['hello', 'world'])) {
			$this->addError($attr, 'Wrong');
		}
	}

}
