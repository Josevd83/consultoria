<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DOCUMENTO */

$this->title = 'Update Documento: ' . $model->ID_DOCUMENTO;
$this->params['breadcrumbs'][] = ['label' => 'Documentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_DOCUMENTO, 'url' => ['view', 'id' => $model->ID_DOCUMENTO]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="documento-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
