<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MOVIMIENTO */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="movimiento-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ID_MOVIMIENTO')->textInput() ?>

    <?= $form->field($model, 'ID_DOCUMENTO')->textInput() ?>

    <?= $form->field($model, 'ID_ESTATUS')->textInput() ?>

    <?= $form->field($model, 'ID_DEPARTAMENTO')->textInput() ?>

    <?= $form->field($model, 'ID_USUARIO')->textInput() ?>

    <?= $form->field($model, 'ID_SOLICITANTE')->textInput() ?>

    <?= $form->field($model, 'ID_TIPO_MOVIMIENTO')->textInput() ?>

    <?= $form->field($model, 'ID_TIPO_DOCUMENTO')->textInput() ?>

    <?= $form->field($model, 'ID_PASO')->textInput() ?>

    <?= $form->field($model, 'NRO_PASO')->textInput() ?>

    <?= $form->field($model, 'DESCRIPCION_PASO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'OBSERVACIONES')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FECHA_CREACION')->textInput() ?>

    <?= $form->field($model, 'FECHA_MODIFICACION')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
