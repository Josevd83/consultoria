<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DOCUMENTO */

$this->title = 'Crear Trámite';
$this->params['breadcrumbs'][] = ['label' => 'Documentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="documento-create">
	<div class="box box-info" style="width:70%; margin:0 auto;">
		<div class="box-header with-border"><h3><?= Html::encode($this->title) ?></h3></div>

		<?= $this->render('_form', [
			'model' => $model,
			'modelSolicitante' => $modelSolicitante,
		]) ?>
	</div><!--box-info-->
</div>
