<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MOVIMIENTO */

$this->title = 'Update Movimiento: ' . $model->ID_MOVIMIENTO;
$this->params['breadcrumbs'][] = ['label' => 'Movimientos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_MOVIMIENTO, 'url' => ['view', 'id' => $model->ID_MOVIMIENTO]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="movimiento-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
