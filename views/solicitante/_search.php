<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SOLICITANTESearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="solicitante-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID_SOLICITANTE') ?>

    <?= $form->field($model, 'NACIONALIDAD') ?>

    <?= $form->field($model, 'CEDULA') ?>

    <?= $form->field($model, 'PRIMER_NOMBRE') ?>

    <?= $form->field($model, 'SEGUNDO_NOMBRE') ?>

    <?php // echo $form->field($model, 'PRIMER_APELLIDO') ?>

    <?php // echo $form->field($model, 'SEGUNDO_APELLIDO') ?>

    <?php // echo $form->field($model, 'COD_TELEFONO') ?>

    <?php // echo $form->field($model, 'NRO_TELEFONO') ?>

    <?php // echo $form->field($model, 'CORREO_ELECTRONICO') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
