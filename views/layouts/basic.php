<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AppAsset;
use yii\helpers\Html;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- <?php $this->registerCsrfMetaTags() ?> -->
	<title><?= Html::encode($this->title) ?></title>
	<?php $this->head() ?>
</head>

<body>
	<?php $this->beginBody() ?>

	<div class="wrap">
		<div class="container">
			<ul class="nav nav-pills">
				<li class="nav-item">
					<!-- <a class="nav-link active" aria-current="page" href="#">Active</a> -->
					<!-- <?= Html::a('Главная', '/web/', ['class' => 'nav-link active']) ?> -->
					<?= Html::a('Главная', '/', ['class' => 'nav-link active']) ?>
				</li>
				<li class="nav-item">
					<?= Html::a('Статьи', ['post/index'], ['class' => 'nav-link']) ?>
				</li>
				<li class="nav-item">
					<?= Html::a('Статья', ['post/show'], ['class' => 'nav-link']) ?>
				</li>
			</ul>
			<h1>Hello Basic layout</h1>

			<!-- Пример передачи данных из вида в шаблон. Значение block1 задано в виде show.php -->
			<?php 
				if (isset($this->blocks['block1'])) {
					echo $this->blocks['block1'];
				}
			?>
			<!---------------------------->

			<?= $content ?>
		</div>
	</div>

	<?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>