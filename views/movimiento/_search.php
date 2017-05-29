<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MOVIMIENTOSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="movimiento-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID_MOVIMIENTO') ?>

    <?= $form->field($model, 'ID_DOCUMENTO') ?>

    <?= $form->field($model, 'ID_ESTATUS') ?>

    <?= $form->field($model, 'ID_DEPARTAMENTO') ?>

    <?= $form->field($model, 'ID_USUARIO') ?>

    <?php // echo $form->field($model, 'ID_SOLICITANTE') ?>

    <?php // echo $form->field($model, 'ID_TIPO_MOVIMIENTO') ?>

    <?php // echo $form->field($model, 'ID_TIPO_DOCUMENTO') ?>

    <?php // echo $form->field($model, 'ID_PASO') ?>

    <?php // echo $form->field($model, 'NRO_PASO') ?>

    <?php // echo $form->field($model, 'DESCRIPCION_PASO') ?>

    <?php // echo $form->field($model, 'OBSERVACIONES') ?>

    <?php // echo $form->field($model, 'FECHA_CREACION') ?>

    <?php // echo $form->field($model, 'FECHA_MODIFICACION') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
