<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DOCUMENTO */

$this->title = 'Modificar Documento N° ' . $model->NUM_DOCUMENTO;
$this->params['breadcrumbs'][] = ['label' => 'Documentos', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->ID_DOCUMENTO, 'url' => ['view', 'id' => $model->ID_DOCUMENTO]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="documento-create">
	<div class="box box-info" style="width:70%; margin:0 auto;">
		<div class="box-header with-border"><h3><?= Html::encode($this->title) ?></h3></div>

		<?= $this->render('_formUpdate', [
			'model' => $model,
			'modelSolicitante' => $modelSolicitante,
		]) ?>
	</div><!--box-info-->
</div>
