<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use yii\web\view;
use \yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model app\models\SOLICITANTE */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box box-danger" style="margin-bottom:0;">
	<div class="box-header with-border">
		<h4>Datos del Solicitante</h4>
	</div>
	<div class="box-body">
		<?php $form = ActiveForm::begin([
					'layout' => 'horizontal',
					//'enableAjaxValidation' => true,
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

		<?php //= $form->field($modelSolicitante, 'ID_SOLICITANTE')->textInput() ?>

		<!--<div class="form-group">
			<?php //$modelSolicitante->NACIONALIDAD = 'V'; ?>
			<?php //$nacionalidadPersona = Html::activeDropDownList($modelSolicitante,'NACIONALIDAD',['E'=>'E','V'=>'V'],['class'=>'form-control','style'=>'width:50px;']); ?>
			<?php //= $form->field($modelSolicitante, 'NACIONALIDAD',['template'=>'<div class="col-sm-4">{label}{input}{error}{hint}</div>','options'=>['tag'=>null]])->textInput(['maxlength' => true]) ?>

			<?php //= $form->field($modelSolicitante, 'CEDULA',['template'=>'<div class="col-sm-4">{label}{input}{error}{hint}</div>','inputTemplate' => '<div class="input-group"><span class="input-group-addon" style="padding:0;border:0px;">'.$nacionalidadPersona.'</span>{input}</div>' ,'options'=>['tag'=>null]])->textInput() ?>
		</div>-->
		
			<?= $form->field($modelSolicitante, 'PRIMER_NOMBRE')->textInput(['maxlength' => true,'disabled' => $disable,'onblur'=>'validarInput(".field-solicitante-primer_nombre")'])->label(null,['id'=>'labelPrimerNombre']) ?>

			<?= $form->field($modelSolicitante, 'SEGUNDO_NOMBRE')->textInput(['maxlength' => true,'disabled' => $disable]) ?>
		
			<?= $form->field($modelSolicitante, 'PRIMER_APELLIDO')->textInput(['maxlength' => true,'disabled' => $disable,'onblur'=>'validarInput(".field-solicitante-primer_apellido")'])->label(null,['id'=>'labelPrimerApellido']) ?>

			<?= $form->field($modelSolicitante, 'SEGUNDO_APELLIDO')->textInput(['maxlength' => true,'disabled' => $disable]) ?>
		
			<?php //= $form->field($modelSolicitante, 'COD_TELEFONO',['template'=>'<div class="col-sm-4">{label}{input}{error}{hint}</div>','options'=>['tag'=>null]])->textInput() ?>

			<?php //$modelSolicitante->COD_TELEFONO = '0416'; ?>
			<?php $codigoTelefono = Html::activeDropDownList($modelSolicitante,'COD_TELEFONO',['0212'=>'0212','0416'=>'0416','0426'=>'0426'],['class'=>'form-control','style'=>'width:70px;']); ?>
			<?= $form->field($modelSolicitante, 'NRO_TELEFONO',['inputTemplate' => '<div class="input-group"><span class="input-group-addon" style="padding:0;border:0px;">'.$codigoTelefono.'</span>{input}</div>'])
							->textInput(['onblur'=>'validarInput(".field-solicitante-nro_telefono")'/*,'data-plugin-inputmask'=>'inputmask_nro_telefono'*/])
							->label(null,['id'=>'labelnro_telefono'])
							->widget(yii\widgets\MaskedInput::className(), ['mask' => '999-999-9999',]) ?>
			
			<?= $form->field($modelSolicitante, 'CORREO_ELECTRONICO')->textInput(['maxlength' => true,'onblur'=>'validarInput(".field-solicitante-correo_electronico")'])->label(null,['id'=>'labelCorreo']) ?>


		<?php ActiveForm::end(); ?>
	</div>
</div>
