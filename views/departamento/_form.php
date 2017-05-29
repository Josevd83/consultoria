<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DEPARTAMENTO */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="departamento-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ID_DEPARTAMENTO')->textInput() ?>

    <?= $form->field($model, 'DESCRIPCION')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'GERENCIA')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
