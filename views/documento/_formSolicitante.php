<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SOLICITANTE */
/* @var $form yii\widgets\ActiveForm */
?>

<div style="width:70%; margin:0 auto;">

    <?php $form = ActiveForm::begin([
				'layout' => 'horizontal',
				/*'fieldConfig' => [
					//'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
					'template' => "{beginWrapper}{label}{input}{hint}{error}{endWrapper}",
					'horizontalCssClasses' => [
						'label' => 'col-sm-4',
						'offset' => 'col-sm-offset-4',
						'wrapper' => 'col-sm-8',
						'error' => '',
						'hint' => '',
					],
				],*/
				]); ?>
<div class="form-group">
	
</div>

    <?php //= $form->field($modelSolicitante, 'ID_SOLICITANTE')->textInput() ?>

    <!--<div class="form-group">
		<?php //$modelSolicitante->NACIONALIDAD = 'V'; ?>
		<?php //$nacionalidadPersona = Html::activeDropDownList($modelSolicitante,'NACIONALIDAD',['E'=>'E','V'=>'V'],['class'=>'form-control','style'=>'width:50px;']); ?>
		<?php //= $form->field($modelSolicitante, 'NACIONALIDAD',['template'=>'<div class="col-sm-4">{label}{input}{error}{hint}</div>','options'=>['tag'=>null]])->textInput(['maxlength' => true]) ?>

		<?php //= $form->field($modelSolicitante, 'CEDULA',['template'=>'<div class="col-sm-4">{label}{input}{error}{hint}</div>','inputTemplate' => '<div class="input-group"><span class="input-group-addon" style="padding:0;border:0px;">'.$nacionalidadPersona.'</span>{input}</div>' ,'options'=>['tag'=>null]])->textInput() ?>
    </div>-->
    
    <div class="form-group">
		<?= $form->field($modelSolicitante, 'PRIMER_NOMBRE',['template'=>'<div class="col-sm-6">{label}{input}{error}{hint}</div>', 'labelOptions'=> [ 'class' => null ],'options'=>['tag'=>null]])->textInput(['maxlength' => true]) ?>

		<?= $form->field($modelSolicitante, 'SEGUNDO_NOMBRE',['template'=>'<div class="col-sm-6">{label}{input}{error}{hint}</div>', 'labelOptions'=> [ 'class' => null ], 'options'=>['tag'=>null]])->textInput(['maxlength' => true]) ?>
    </div>
    
    <div class="form-group">
		<?= $form->field($modelSolicitante, 'PRIMER_APELLIDO',['template'=>'<div class="col-sm-6">{label}{input}{error}{hint}</div>', 'labelOptions'=> [ 'class' => null ],'options'=>['tag'=>null]])->textInput(['maxlength' => true]) ?>

		<?= $form->field($modelSolicitante, 'SEGUNDO_APELLIDO',['template'=>'<div class="col-sm-6">{label}{input}{error}{hint}</div>', 'labelOptions'=> [ 'class' => null ],'options'=>['tag'=>null]])->textInput(['maxlength' => true]) ?>
    </div>
    
    <div class="form-group">
		<?php //= $form->field($modelSolicitante, 'COD_TELEFONO',['template'=>'<div class="col-sm-4">{label}{input}{error}{hint}</div>','options'=>['tag'=>null]])->textInput() ?>

		<?php //$modelSolicitante->COD_TELEFONO = '0416'; ?>
		<?php $codigoTelefono = Html::activeDropDownList($modelSolicitante,'COD_TELEFONO',['0212'=>'0212','0416'=>'0416','0426'=>'0426'],['class'=>'form-control','style'=>'width:70px;']); ?>
		<?= $form->field($modelSolicitante, 'NRO_TELEFONO',['template'=>'<div class="col-sm-6">{label}{input}{error}{hint}</div>','inputTemplate' => '<div class="input-group"><span class="input-group-addon" style="padding:0;border:0px;">'.$codigoTelefono.'</span>{input}</div>', 'labelOptions'=> [ 'class' => null ],'options'=>['tag'=>null]])->textInput() ?>
		
		<?= $form->field($modelSolicitante, 'CORREO_ELECTRONICO',['template'=>'<div class="col-sm-6">{label}{input}{error}{hint}</div>','labelOptions'=> [ 'class' => null ],'options'=>['tag'=>null]])->textInput(['maxlength' => true]) ?>
    </div>


    <?php ActiveForm::end(); ?>

</div>
