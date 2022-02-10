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

<!-- Форма -->
<?php $form = ActiveForm::begin(['options' => ['class' => 'form-horizontal', 'id' => 'testForm']]) ?>
<?= $form->field($model, 'name') ?>
<?= $form->field($model, 'email')->input('email') ?>
<?= $form->field($model, 'text')->textarea(['rows' => 5]) ?>
<?= Html::submitButton('Отправить', ['class' => 'btn btn-success']) ?>
<?php ActiveForm::end() ?>
<!----------------------------->