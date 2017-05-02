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
use yii\helpers\Url;

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

			<?php //= $form->field($model, 'ID_SOLICITANTE')->textInput() ?>
			
			
			<?php $model->nacionalidadSolicitante = 'V'; ?>
			<?php $nacionalidad = Html::activeDropDownList($model,'nacionalidadSolicitante',['E'=>'E','V'=>'V'],['class'=>'form-control','style'=>'width:50px;']); ?>
			<?php echo $form->field($model, 'cedulaSolicitante', [
				'inputTemplate' => '<div class="input-group"><span class="input-group-addon" style="padding:0;border:0px;">'.$nacionalidad.'</span>{input}<span class="input-group-addon" style="padding:0;"><button type="button" id="buscar_cedula" class="btn btn-primary" style="border-radius:0px;border:0px;">Buscar</button></span></div>',
			])->textInput(['maxlength'=>'9']); 
			?>
			
				<div id="cargando"></div>
				<!-- DATOS DEL SOLICITANTE -->
				<div id="div_datos_persona" style="display:none">
						<div class="box box-danger" style="margin-bottom:0;">
							<div style="border-bottom: 1px solid #f4f4f4; padding-top:10px;"></div>
							<div class="box-header with-border">
								<h4>Datos del Solicitante</h4>
							</div>
							<div class="box-body">
								<?= $form->field($modelSolicitante, 'PRIMER_NOMBRE')->textInput(['maxlength' => true]) ?>

								<?= $form->field($modelSolicitante, 'SEGUNDO_NOMBRE')->textInput(['maxlength' => true]) ?>
							
								<?= $form->field($modelSolicitante, 'PRIMER_APELLIDO')->textInput(['maxlength' => true]) ?>

								<?= $form->field($modelSolicitante, 'SEGUNDO_APELLIDO')->textInput(['maxlength' => true]) ?>
							
								<?php //= $form->field($modelSolicitante, 'COD_TELEFONO',['template'=>'<div class="col-sm-4">{label}{input}{error}{hint}</div>','options'=>['tag'=>null]])->textInput() ?>

								<?php //$modelSolicitante->COD_TELEFONO = '0416'; ?>
								<?php $codigoTelefono = Html::activeDropDownList($modelSolicitante,'COD_TELEFONO',['0212'=>'0212','0416'=>'0416','0426'=>'0426'],['class'=>'form-control','style'=>'width:70px;']); ?>
								<?= $form->field($modelSolicitante, 'NRO_TELEFONO',['inputTemplate' => '<div class="input-group"><span class="input-group-addon" style="padding:0;border:0px;">'.$codigoTelefono.'</span>{input}</div>'])
											->textInput()
											//->label(null,['id'=>'labelnro_telefono'])
											->widget(yii\widgets\MaskedInput::className(), ['mask' => '999-9999',]) ?>
							
								<?= $form->field($modelSolicitante, 'CORREO_ELECTRONICO')->textInput(['maxlength' => true])/*->widget(yii\widgets\MaskedInput::className(), ['mask' => '*{1,20}[.*{1,20}][.*{1,20}][.*{1,20}]@*{1,20}[.*{2,6}][.*{1,2}]',])*/ ?>
							</div>
					</div>
				</div>
				<!-- DATOS DEL SOLICITANTE -->
				
				<div class="box-header with-border" style="padding:10px;">
					<h4>Datos del Trámite</h4>
				</div>
			
				<div style="padding:10px;"></div>

			<?= $form->field($model, 'ID_TIPO_DOCUMENTO')->dropDownList(
				ArrayHelper::map(TIPODOCUMENTO::find()->All(), 'ID_TIPO_DOCUMENTO','DESCRIPCION'),
				['prompt'=>'Seleccione']
			)?>

			<?= $form->field($model, 'ID_TIPO_SOLICITUD')->dropDownList(
				ArrayHelper::map(TIPOSOLICITUD::find()->All(), 'ID_TIPO_SOLICITUD', 'DESCRIPCION'),
				[
					'prompt'=>'Seleccione',
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
        <?= Html::submitButton($model->isNewRecord ? 'Crear Trámite' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'/*, 'onclick'=>'validarInput("boton")'*/]) ?>
    </div>

    <?php ActiveForm::end(); ?>
    
 <?php
	 $this->registerJs(
		"$('#documento-id_tipo_solicitud').on('change', function() {
			$('#documento-id_banco').val('');
			$('#documento-id_organismo').val('');
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
		});
		
		$('#buscar_cedula').on('click',function(){
			var nacionalidad = $('#documento-nacionalidadsolicitante').val();
			var num_cedula   = $('#documento-cedulasolicitante').val();
			
			if(num_cedula==''){
					$('.field-documento-cedulasolicitante').addClass('has-error');
					$('.field-documento-cedulasolicitante').find('.help-block').html('Ingrese la Cédula');
					$('#solicitante-primer_nombre').val('').attr('readonly', false);
					$('#solicitante-segundo_nombre').val('').attr('readonly', false);
					$('#solicitante-primer_apellido').val('').attr('readonly', false);
					$('#solicitante-segundo_apellido').val('').attr('readonly', false);
					$('#solicitante-nro_telefono').val('').attr('readonly', false);
					$('#solicitante-correo_electronico').val('').attr('readonly', false);
					$('#div_datos_persona').hide();
					return false;
			}
			
			$('#div_datos_persona').hide();	
			$('#cargando').html('<div class=\'form-group\'><div class=\'col-sm-3\'></div><div class=\'col-sm-6\'><i class=\'fa fa-refresh fa-spin\'></i> Buscando...</div></div>');
				
			$.ajax({
				type: 'POST',
				dataType: 'json',
				url: '".Url::toRoute("documento/buscarpersona")."',
				data: {nacionalidad: nacionalidad, num_cedula: num_cedula},
				success:function(data){
					$('#cargando').html('');
					if(data == 0)
					{
							//alert('No hay registros');
							$('#solicitante-primer_nombre').val('').attr('readonly', false);
							$('#solicitante-segundo_nombre').val('').attr('readonly', false);
							$('#solicitante-primer_apellido').val('').attr('readonly', false);
							$('#solicitante-segundo_apellido').val('').attr('readonly', false);
							$('#solicitante-nro_telefono').val('').attr('readonly', false);
							$('#solicitante-correo_electronico').val('').attr('readonly', false);
							$('#div_datos_persona').show('fade');
					}else{
							$('#solicitante-primer_nombre').val(data.PRIMER_NOMBRE).attr('readonly', true);
							$('#solicitante-segundo_nombre').val(data.SEGUNDO_NOMBRE).attr('readonly', true);
							$('#solicitante-primer_apellido').val(data.PRIMER_APELLIDO).attr('readonly', true);
							$('#solicitante-segundo_apellido').val(data.SEGUNDO_APELLIDO).attr('readonly', true);
							$('#solicitante-nro_telefono').val('').attr('readonly', false);
							$('#solicitante-correo_electronico').val('').attr('readonly', false);
							$('#div_datos_persona').show('fade');
					}
				}
			}); //ajax
		});",
		View::POS_READY 
	);
 ?>
<?php $script = "function validarInput(clase) {
		if(clase == 'boton'){
			var result = true;
			if($('.field-solicitante-primer_nombre').find('input').val()==''){
				$('.field-solicitante-primer_nombre').addClass('has-error');
				$('.field-solicitante-primer_nombre').find('.help-block').html('No puede estar vacío');
				result = false;
			}
			if($('.field-solicitante-primer_apellido').find('input').val()==''){
				$('.field-solicitante-primer_apellido').addClass('has-error');
				$('.field-solicitante-primer_apellido').find('.help-block').html('No puede estar vacío');
				result = false;
			}
			if($('.field-solicitante-nro_telefono').find('input').val()==''){
				$('.field-solicitante-nro_telefono').addClass('has-error');
				$('.field-solicitante-nro_telefono').find('.help-block').html('No puede estar vacío');
				result = false;
			}
			if($('.field-solicitante-correo_electronico').find('input').val()==''){
				$('.field-solicitante-correo_electronico').addClass('has-error');
				$('.field-solicitante-correo_electronico').find('.help-block').html('No puede estar vacío');
				result = false;
			}
			return result;
		}
		else{
			if($(clase).find('input').val()==''){
				$(clase).addClass('has-error');
				$(clase).find('.help-block').html('No puede estar vacío');
				return false;
			}
		}	
	}"; 
?>
<?php $this->registerJs($script,View::POS_END); ?>
