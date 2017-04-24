<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
//use yii\widgets\ActiveForm;
use app\models\TIPODOCUMENTO;
use app\models\TIPOSOLICITUD;
use app\models\ORGANISMO;
use app\models\BANCO;
use app\models\ABOGADO;
use yii\bootstrap\ActiveForm;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model app\models\DOCUMENTO */
/* @var $form yii\widgets\ActiveForm */
?>

	<div class="box-body">
		<?php $form = ActiveForm::begin([
				'layout' => 'horizontal',
				/*'fieldConfig' => [
					'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
					'horizontalCssClasses' => [
						'label' => 'col-sm-4',
						'offset' => 'col-sm-offset-4',
						'wrapper' => 'col-sm-8',
						'error' => '',
						'hint' => '',
					],
				],*/
				]); ?>

			<?= $form->field($model, 'ID_SOLICITANTE')->textInput() ?>

			<?= $form->field($model, 'ID_TIPO_DOCUMENTO')->dropDownList(
				ArrayHelper::map(TIPODOCUMENTO::find()->All(), 'ID_TIPO_DOCUMENTO','DESCRIPCION'),
				['prompt'=>'Seleccione']
			)?>

			<?= $form->field($model, 'ID_TIPO_SOLICITUD')->dropDownList(
				ArrayHelper::map(TIPOSOLICITUD::find()->All(), 'ID_TIPO_SOLICITUD', 'DESCRIPCION'),
				[
					'prompt'=>'Seleccione',
					//'onchange'=>'tipo_solicitud(this)'
					//'onchange'=>'js:tipo_solicitud();'
				]
			)?>

			<div id='DIV_ID_ORGANISMO' style="display: none">
				<?= $form->field($model, 'ID_ORGANISMO')->dropDownList(
					ArrayHelper::map(ORGANISMO::find()->All(), 'ID_ORGANISMO', 'DESCRIPCION'),
					['prompt' => 'Seleccione']
				) ?>
			</div>
			

			<div id='DIV_ID_BANCO' style="display: none">
				<?= $form->field($model, 'ID_BANCO')->dropDownList(
					ArrayHelper::map(BANCO::find()->All(), 'ID_BANCO', 'DESCRIPCION'),
					['prompt' => 'Seleccione']
				) ?>
			</div>

			<?= $form->field($model, 'NUM_DOCUMENTO')->textInput() ?>

			<?= $form->field($model, 'NUM_OFICIO')->textInput() ?>

			<?= $form->field($model, 'OBSERVACIONES')->textArea(['maxlength' => true]) ?>

			<?= $form->field($model, 'ID_ABOGADO')->dropDownList(
				ArrayHelper::map(ABOGADO::find()->All(),'ID_ABOGADO', function($model, $defaultValue){ return $model['PRIMER_NOMBRE']." ".$model['PRIMER_APELLIDO']; }),
				['prompt' => 'Seleccione']
			) ?>
	</div><!--box-body-->
    <div class="box-footer text-center">
        <?= Html::submitButton($model->isNewRecord ? 'Crear Trámite' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    
 <?php
	 $this->registerJs(
		"
			
		
		$('#documento-id_tipo_solicitud').on('change', function() {
			var seleccionado = $('#documento-id_tipo_solicitud').val();
				if(seleccionado == '2'){ //Operador Financiero
					$('#DIV_ID_BANCO').show('fade');
					$('#DIV_ID_ORGANISMO').hide('fade');
				}else{
						if(seleccionado == '3'){ //Organismo
							$('#DIV_ID_ORGANISMO').show('fade');
							$('#DIV_ID_BANCO').hide('fade');
						}else{
								$('#DIV_ID_ORGANISMO').hide('fade');
								$('#DIV_ID_BANCO').hide('fade');
							}
					}
		});",
		View::POS_READY
		
	);
 ?>   


