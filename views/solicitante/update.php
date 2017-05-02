<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SOLICITANTE */

$this->title = 'Update Solicitante: ' . $model->ID_SOLICITANTE;
$this->params['breadcrumbs'][] = ['label' => 'Solicitantes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_SOLICITANTE, 'url' => ['view', 'id' => $model->ID_SOLICITANTE]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="solicitante-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
