<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\VISTAMOVIMIENTO */

$this->title = 'Update Vistamovimiento: ' . $model->ID_MOVIMIENTO;
$this->params['breadcrumbs'][] = ['label' => 'Vistamovimientos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_MOVIMIENTO, 'url' => ['view', 'id' => $model->ID_MOVIMIENTO]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="vistamovimiento-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
