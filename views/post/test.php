<?php
// подключение виджетов для формы
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

<h1>Test Action</h1>

<?php
//<---- вызов функции записанной вв контроллере PostContrller.php внутри вида
// use function app\controllers\debug;

// debug($names);
//-------------------> 

//<---- вызов функции записанной в файле fucntions.php, где добавлены кастомные функции
debug($names);
//------------------->
?>

<!-- вывод сообщения об успешной валидации формы -->
<?php if (Yii::$app->session->hasFlash('success')) : ?>
	<div class="alert alert-success alert-dismissible fade show" role="alert">
		<strong>Данные приняты</strong> 
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
<?php endif; ?>

<!-- вывод сообщения об ошибке при валидации формы -->
<?php if (Yii::$app->session->hasFlash('error')) : ?>
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
		<strong>Ошибка! Проверьте данные</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
<?php endif; ?>

<!-- Форма -->
<?php $form = ActiveForm::begin(['options' => ['class' => 'form-horizontal', 'id' => 'testForm']]) ?>
<?= $form->field($model, 'name') ?>
<?= $form->field($model, 'email')->input('email') ?>

<!-- инпут для выбора даты с помощью виджета - DatePicker из установленного расширения JQuery UI -->
<?= yii\jui\DatePicker::widget(['name' => 'attributeName']) ?>

<?= $form->field($model, 'text')->textarea(['rows' => 5]) ?>
<?= Html::submitButton('Отправить', ['class' => 'btn btn-success']) ?>
<?php ActiveForm::end() ?>
<!----------------------------->