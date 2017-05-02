<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DOCUMENTOSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="documento-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID_DOCUMENTO') ?>

    <?= $form->field($model, 'ID_SOLICITANTE') ?>

    <?= $form->field($model, 'ID_TIPO_DOCUMENTO') ?>

    <?= $form->field($model, 'ID_TIPO_SOLICITUD') ?>

    <?= $form->field($model, 'ID_ORGANISMO') ?>

    <?php // echo $form->field($model, 'ID_BANCO') ?>

    <?php // echo $form->field($model, 'NUM_DOCUMENTO') ?>

    <?php // echo $form->field($model, 'FECHA_CREACION') ?>

    <?php // echo $form->field($model, 'NUM_OFICIO') ?>

    <?php // echo $form->field($model, 'ID_ESTATUS') ?>

    <?php // echo $form->field($model, 'ID_USUARIO') ?>

    <?php // echo $form->field($model, 'OBSERVACIONES') ?>

    <?php // echo $form->field($model, 'FECHA_MODIFICACION') ?>

    <?php // echo $form->field($model, 'ID_ABOGADO') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
