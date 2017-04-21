<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SOLICITANTE */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="solicitante-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ID_SOLICITANTE')->textInput() ?>

    <?= $form->field($model, 'NACIONALIDAD')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CEDULA')->textInput() ?>

    <?= $form->field($model, 'PRIMER_NOMBRE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SEGUNDO_NOMBRE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PRIMER_APELLIDO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SEGUNDO_APELLIDO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'COD_TELEFONO')->textInput() ?>

    <?= $form->field($model, 'NRO_TELEFONO')->textInput() ?>

    <?= $form->field($model, 'CORREO_ELECTRONICO')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
