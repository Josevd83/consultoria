<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use yii\helpers\Url;
use kartik\widgets\Growl;
use app\models\DOCUMENTO;
/* @var $this yii\web\View */
/* @var $model app\models\DOCUMENTO */
?>

<?php
$this->title = 'Detalle del Documento';
$this->params['breadcrumbs'][] = ['label' => 'Documentos', 'url' => ['index']];
?>

<?php foreach (Yii::$app->session->getAllFlashes() as $message):; ?>
	<?php
		echo \kartik\widgets\Growl::widget([
			//'type' => (!empty($message['type'])) ? $message['type'] : 'danger',
			'type' => (!empty($message['type'])) ? $message['type'] : Growl::TYPE_SUCCESS,
			'title' => (!empty($message['title'])) ? Html::encode($message['title']) : 'Title Not Set!',
			'icon' => (!empty($message['icon'])) ? $message['icon'] : 'fa fa-info',
			'body' => (!empty($message['message'])) ? Html::encode($message['message']) : 'Message Not Set!',
			'showSeparator' => true,
			'delay' => 1, //This delay is how long before the message shows
			'pluginOptions' => [
				'delay' => (!empty($message['duration'])) ? $message['duration'] : 3000, //This delay is how long the message shows for
				'showProgressbar' => (!empty($message['showProgressbar'])) ? $message['showProgressbar'] : true,
				'placement' => [
					'from' => (!empty($message['positonY'])) ? $message['positonY'] : 'top',
					'align' => (!empty($message['positonX'])) ? $message['positonX'] : 'right',
					
				]
			]
		]);
	?>
<?php endforeach; ?>

<p>
        <?= Html::a('Ver Listado', ['index'],['class'=>'btn btn-warning'])?>
</p>

<div class="documento-view">

    
    <?php if($model->ID_TIPO_SOLICITUD == 2 || $model->ID_TIPO_SOLICITUD == 3)
    {
		$attributes = [
							[
								'group'=>true,
								'label'=>'<span class="glyphicon glyphicon-user"></span> DATOS DEL SOLICITANTE',
								'rowOptions'=>['class'=>'info']
							],
							[
								'columns' => [
												[
													'attribute'=>'ID_SOLICITANTE',
													'value'=>$model->solicitante->NACIONALIDAD."-".$model->solicitante->CEDULA,
													//'type'=>DetailView::INPUT_SELECT2, 
													'label'=>'Cédula',
													'displayOnly'=>true,
													'valueColOptions'=>['style'=>'width:30%']
												],
												[
													'attribute'=>'ID_SOLICITANTE',
													'label'=>'Número de Teléfono',
													'value'=>"(".$model->solicitante->COD_TELEFONO.") ".$model->solicitante->NRO_TELEFONO,
													'displayOnly'=>true,
													'valueColOptions'=>['style'=>'width:30%']
												],
											 ],
							],
							[
								'columns' => [
												[
													'attribute'=>'ID_SOLICITANTE',
													'value'=>$model->solicitante->PRIMER_NOMBRE." ".$model->solicitante->SEGUNDO_NOMBRE,
													//'type'=>DetailView::INPUT_SELECT2, 
													'label'=>'Nombres',
													'displayOnly'=>true,
													'valueColOptions'=>['style'=>'width:30%']
												],
												[
													'attribute'=>'ID_SOLICITANTE',
													'label'=>'Correo Electrónico',
													'value'=>$model->solicitante->CORREO_ELECTRONICO,
													'displayOnly'=>true,
													'valueColOptions'=>['style'=>'width:30%']
												],
											 ],
							],
							[
								'columns' => [
												[
													'attribute'=>'ID_SOLICITANTE',
													'value'=>$model->solicitante->PRIMER_APELLIDO." ".$model->solicitante->SEGUNDO_APELLIDO,
													//'type'=>DetailView::INPUT_SELECT2, 
													'label'=>'Apellidos',
													'displayOnly'=>true,
													'valueColOptions'=>['style'=>'width:30%']
												],
												[
													'attribute'=>'ID_SOLICITANTE',
													'label'=>'',
													'value'=>'',
													'displayOnly'=>true,
													'valueColOptions'=>['style'=>'width:30%']
												],
											 ],
							],
							[
								'group'=>true,
								'label'=>'<span class="glyphicon glyphicon-file"></span> DATOS DEL DOCUMENTO',
								'rowOptions'=>['class'=>'info']
							],
							[
								'columns' => [
												[
													'attribute'=>'ID_DOCUMENTO',
													'value'=>$model->documento->NUM_DOCUMENTO,
													//'type'=>DetailView::INPUT_SELECT2, 
													'label'=>'Número de Documento',
													'displayOnly'=>true,
													'valueColOptions'=>['style'=>'width:30%']
												],
												[
													'attribute'=>'ID_DOCUMENTO',
													'value'=>$model->documento->NUM_OFICIO,
													//'type'=>DetailView::INPUT_SELECT2, 
													'label'=>'Número de Oficio',
													'displayOnly'=>true,
													'valueColOptions'=>['style'=>'width:30%']
												],
											 ]
							],
							[
								'columns' => [
												[
													'attribute'=>'ID_TIPO_DOCUMENTO',
													'value'=>$model->tipoDocumento->DESCRIPCION,
													//'type'=>DetailView::INPUT_SELECT2, 
													'label'=>'Tipo de Documento',
													'displayOnly'=>true,
													'valueColOptions'=>['style'=>'width:30%']
												],
												[
													'attribute'=>'ID_DOCUMENTO',
													'value'=>$model->documento->OBSERVACIONES,
													//'type'=>DetailView::INPUT_SELECT2, 
													'label'=>'Observaciones',
													'displayOnly'=>true,
													'valueColOptions'=>['style'=>'width:30%']
												],
											 ]
							],
							[
								'columns' => [
												[
													'attribute'=>'ID_TIPO_SOLICITUD',
													'value'=>$model->tipoSolicitud->DESCRIPCION,
													//'type'=>DetailView::INPUT_SELECT2, 
													'label'=>'Tipo de Solicitud',
													'displayOnly'=>true,
													'valueColOptions'=>['style'=>'width:30%']
												],
												[
													'attribute'=>'FECHA_CREACION',
													//'value'=>$model->solicitante->PRIMER_APELLIDO." ".$model->solicitante->SEGUNDO_APELLIDO,
													//'type'=>DetailView::INPUT_SELECT2, 
													'label'=>'Fecha de Creación',
													'displayOnly'=>true,
													'valueColOptions'=>['style'=>'width:30%']
												],
											 ]
						   ], 
						   [
								'columns' => [
												[
													'attribute'=>($model->ID_TIPO_SOLICITUD == 2)?'ID_BANCO':'ID_ORGANISMO',
													'value'=>($model->ID_TIPO_SOLICITUD == 2)?$model->banco->DESCRIPCION:$model->organismo->DESCRIPCION,
													//'type'=>DetailView::INPUT_SELECT2, 
													'label'=>($model->ID_TIPO_SOLICITUD == 2)?'Banco':'Organismo',
													'displayOnly'=>true,
													'valueColOptions'=>['style'=>'width:30%']
												],
												[
													'attribute'=>'',
													'label'=>'',
													'value'=>'',
													'displayOnly'=>true,
													'valueColOptions'=>['style'=>'width:30%']
												],
											 ],
							],
							[
								'group'=>true,
								'label'=>'<span class="glyphicon glyphicon-briefcase"></span> DATOS DEL ABOGADO',
								'rowOptions'=>['class'=>'info']
							],
							[
								'columns' => [
												[
													'attribute'=>'ID_ABOGADO',
													'value'=>$model->abogado->NACIONALIDAD."-".$model->abogado->CEDULA,
													//'type'=>DetailView::INPUT_SELECT2, 
													'label'=>'Cédula',
													'displayOnly'=>true,
													'valueColOptions'=>['style'=>'width:30%']
												],
												[
													'attribute'=>'ID_ABOGADO',
													'value'=>$model->abogado->estatus->DESCRIPCION,
													//'type'=>DetailView::INPUT_SELECT2, 
													'label'=>'Estatus',
													'displayOnly'=>true,
													'valueColOptions'=>['style'=>'width:30%']
												],
											 ]
							],
							[
								'columns' => [
												[
													'attribute'=>'ID_ABOGADO',
													'value'=>$model->abogado->PRIMER_NOMBRE." ".$model->abogado->SEGUNDO_NOMBRE,
													//'type'=>DetailView::INPUT_SELECT2, 
													'label'=>'Nombres',
													'displayOnly'=>true,
													'valueColOptions'=>['style'=>'width:30%']
												],
												[
													'attribute'=>'ID_ABOGADO',
													'value'=>'',
													//'type'=>DetailView::INPUT_SELECT2, 
													'label'=>'',
													'displayOnly'=>true,
													'valueColOptions'=>['style'=>'width:30%']
												],
											 ]
							],
							[
								'columns' => [
												[
													'attribute'=>'ID_ABOGADO',
													'value'=>$model->abogado->PRIMER_APELLIDO." ".$model->abogado->SEGUNDO_APELLIDO,
													//'type'=>DetailView::INPUT_SELECT2, 
													'label'=>'Apellidos',
													'displayOnly'=>true,
													'valueColOptions'=>['style'=>'width:30%']
												],
												[
													'attribute'=>'ID_ABOGADO',
													'value'=>'',
													//'type'=>DetailView::INPUT_SELECT2, 
													'label'=>'',
													'displayOnly'=>true,
													'valueColOptions'=>['style'=>'width:30%']
												],
											 ]
							],
							[
								'group'=>true,
								'label'=>'<span class="glyphicon glyphicon-level-up"></span> ESTATUS DEL DOCUMENTO',
								'rowOptions'=>['class'=>'info']
							],
							[
								'columns' => [
												[
													'attribute'=>'NRO_PASO',
													'value'=>$model->NRO_PASO,
													//'type'=>DetailView::INPUT_SELECT2, 
													'label'=>'N° de Paso',
													'displayOnly'=>true,
													'valueColOptions'=>['style'=>'width:30%']
												],
												[
													'attribute'=>'ID_ESTATUS',
													'value'=>$model->estatus->DESCRIPCION,
													//'type'=>DetailView::INPUT_SELECT2, 
													'label'=>'Estatus',
													'displayOnly'=>true,
													'valueColOptions'=>['style'=>'width:30%']
												],
											 ]
							],
							[
								'columns' => [
												[
													'attribute'=>'DESCRIPCION_PASO',
													'value'=>$model->DESCRIPCION_PASO,
													//'type'=>DetailView::INPUT_SELECT2, 
													'label'=>'Descripción',
													'displayOnly'=>true,
													'valueColOptions'=>['style'=>'width:30%']
												],
												[
													'attribute'=>'ID_ABOGADO',
													'value'=>'',
													//'type'=>DetailView::INPUT_SELECT2, 
													'label'=>'',
													'displayOnly'=>true,
													'valueColOptions'=>['style'=>'width:30%']
												],
											 ]
							],
					  ];
	}else{
		
    
		$attributes = [
							[
								'group'=>true,
								'label'=>'<span class="glyphicon glyphicon-user"></span> DATOS DEL SOLICITANTE',
								'rowOptions'=>['class'=>'info']
							],
							[
								'columns' => [
												[
													'attribute'=>'ID_SOLICITANTE',
													'value'=>$model->solicitante->NACIONALIDAD."-".$model->solicitante->CEDULA,
													//'type'=>DetailView::INPUT_SELECT2, 
													'label'=>'Cédula',
													'displayOnly'=>true,
													'valueColOptions'=>['style'=>'width:30%']
												],
												[
													'attribute'=>'ID_SOLICITANTE',
													'label'=>'Número de Teléfono',
													'value'=>"(".$model->solicitante->COD_TELEFONO.") ".$model->solicitante->NRO_TELEFONO,
													'displayOnly'=>true,
													'valueColOptions'=>['style'=>'width:30%']
												],
											 ],
							],
							[
								'columns' => [
												[
													'attribute'=>'ID_SOLICITANTE',
													'value'=>$model->solicitante->PRIMER_NOMBRE." ".$model->solicitante->SEGUNDO_NOMBRE,
													//'type'=>DetailView::INPUT_SELECT2, 
													'label'=>'Nombres',
													'displayOnly'=>true,
													'valueColOptions'=>['style'=>'width:30%']
												],
												[
													'attribute'=>'ID_SOLICITANTE',
													'label'=>'Correo Electrónico',
													'value'=>$model->solicitante->CORREO_ELECTRONICO,
													'displayOnly'=>true,
													'valueColOptions'=>['style'=>'width:30%']
												],
											 ],
							],
							[
								'columns' => [
												[
													'attribute'=>'ID_SOLICITANTE',
													'value'=>$model->solicitante->PRIMER_APELLIDO." ".$model->solicitante->SEGUNDO_APELLIDO,
													//'type'=>DetailView::INPUT_SELECT2, 
													'label'=>'Apellidos',
													'displayOnly'=>true,
													'valueColOptions'=>['style'=>'width:30%']
												],
												[
													'attribute'=>'ID_SOLICITANTE',
													'label'=>'',
													'value'=>'',
													'displayOnly'=>true,
													'valueColOptions'=>['style'=>'width:30%']
												],
											 ],
							],
							[
								'group'=>true,
								'label'=>'<span class="glyphicon glyphicon-file"></span> DATOS DEL DOCUMENTO',
								'rowOptions'=>['class'=>'info']
							],
							[
								'columns' => [
												[
													'attribute'=>'ID_DOCUMENTO',
													'value'=>$model->documento->NUM_DOCUMENTO,
													//'type'=>DetailView::INPUT_SELECT2, 
													'label'=>'Número de Documento',
													'displayOnly'=>true,
													'valueColOptions'=>['style'=>'width:30%']
												],
												[
													'attribute'=>'ID_DOCUMENTO',
													'value'=>$model->documento->NUM_OFICIO,
													//'type'=>DetailView::INPUT_SELECT2, 
													'label'=>'Número de Oficio',
													'displayOnly'=>true,
													'valueColOptions'=>['style'=>'width:30%']
												],
											 ]
							],
							[
								'columns' => [
												[
													'attribute'=>'ID_TIPO_DOCUMENTO',
													'value'=>$model->tipoDocumento->DESCRIPCION,
													//'type'=>DetailView::INPUT_SELECT2, 
													'label'=>'Tipo de Documento',
													'displayOnly'=>true,
													'valueColOptions'=>['style'=>'width:30%']
												],
												[
													'attribute'=>'ID_DOCUMENTO',
													'value'=>$model->documento->OBSERVACIONES,
													//'type'=>DetailView::INPUT_SELECT2, 
													'label'=>'Observaciones',
													'displayOnly'=>true,
													'valueColOptions'=>['style'=>'width:30%']
												],
											 ]
							],
							[
								'columns' => [
												[
													'attribute'=>'ID_TIPO_SOLICITUD',
													'value'=>$model->tipoSolicitud->DESCRIPCION,
													//'type'=>DetailView::INPUT_SELECT2, 
													'label'=>'Tipo de Solicitud',
													'displayOnly'=>true,
													'valueColOptions'=>['style'=>'width:30%']
												],
												[
													'attribute'=>'FECHA_CREACION',
													//'value'=>$model->solicitante->PRIMER_APELLIDO." ".$model->solicitante->SEGUNDO_APELLIDO,
													//'type'=>DetailView::INPUT_SELECT2, 
													'label'=>'Fecha de Creación',
													'displayOnly'=>true,
													'valueColOptions'=>['style'=>'width:30%']
												],
											 ]
						   ], 
							[
								'group'=>true,
								'label'=>'<span class="glyphicon glyphicon-briefcase"></span> DATOS DEL ABOGADO',
								'rowOptions'=>['class'=>'info']
							],
							[
								'columns' => [
												[
													'attribute'=>'ID_ABOGADO',
													'value'=>$model->abogado->NACIONALIDAD."-".$model->abogado->CEDULA,
													//'type'=>DetailView::INPUT_SELECT2, 
													'label'=>'Cédula',
													'displayOnly'=>true,
													'valueColOptions'=>['style'=>'width:30%']
												],
												[
													'attribute'=>'ID_ABOGADO',
													'value'=>$model->abogado->estatus->DESCRIPCION,
													//'type'=>DetailView::INPUT_SELECT2, 
													'label'=>'Estatus',
													'displayOnly'=>true,
													'valueColOptions'=>['style'=>'width:30%']
												],
											 ]
							],
							[
								'columns' => [
												[
													'attribute'=>'ID_ABOGADO',
													'value'=>$model->abogado->PRIMER_NOMBRE." ".$model->abogado->SEGUNDO_NOMBRE,
													//'type'=>DetailView::INPUT_SELECT2, 
													'label'=>'Nombres',
													'displayOnly'=>true,
													'valueColOptions'=>['style'=>'width:30%']
												],
												[
													'attribute'=>'ID_ABOGADO',
													'value'=>'',
													//'type'=>DetailView::INPUT_SELECT2, 
													'label'=>'',
													'displayOnly'=>true,
													'valueColOptions'=>['style'=>'width:30%']
												],
											 ]
							],
							[
								'columns' => [
												[
													'attribute'=>'ID_ABOGADO',
													'value'=>$model->abogado->PRIMER_APELLIDO." ".$model->abogado->SEGUNDO_APELLIDO,
													//'type'=>DetailView::INPUT_SELECT2, 
													'label'=>'Apellidos',
													'displayOnly'=>true,
													'valueColOptions'=>['style'=>'width:30%']
												],
												[
													'attribute'=>'ID_ABOGADO',
													'value'=>'',
													//'type'=>DetailView::INPUT_SELECT2, 
													'label'=>'',
													'displayOnly'=>true,
													'valueColOptions'=>['style'=>'width:30%']
												],
											 ]
							],
							[
								'group'=>true,
								'label'=>'<span class="glyphicon glyphicon-level-up"></span> ESTATUS DEL DOCUMENTO',
								'rowOptions'=>['class'=>'info']
							],
							[
								'columns' => [
												[
													'attribute'=>'NRO_PASO',
													'value'=>$model->NRO_PASO,
													//'type'=>DetailView::INPUT_SELECT2, 
													'label'=>'N° de Paso',
													'displayOnly'=>true,
													'valueColOptions'=>['style'=>'width:30%']
												],
												[
													'attribute'=>'ID_ESTATUS',
													'value'=>$model->estatus->DESCRIPCION,
													//'type'=>DetailView::INPUT_SELECT2, 
													'label'=>'Estatus',
													'displayOnly'=>true,
													'valueColOptions'=>['style'=>'width:30%']
												],
											 ]
							],
							[
								'columns' => [
												[
													'attribute'=>'DESCRIPCION_PASO',
													'value'=>$model->DESCRIPCION_PASO,
													//'type'=>DetailView::INPUT_SELECT2, 
													'label'=>'Descripción',
													'displayOnly'=>true,
													'valueColOptions'=>['style'=>'width:30%']
												],
												[
													'attribute'=>'ID_ABOGADO',
													'value'=>'',
													//'type'=>DetailView::INPUT_SELECT2, 
													'label'=>'',
													'displayOnly'=>true,
													'valueColOptions'=>['style'=>'width:30%']
												],
											 ]
							],
					  ];
		}
    ?>
    
    <?php  echo DetailView::widget([
				'model' => $model,
				'attributes' => $attributes,
				'mode' => 'view',
				'panel' => [
							'heading' => '<span class="glyphicon glyphicon-list-alt"></span> INFORMACIÓN GENERAL',
							'type' => DetailView::TYPE_PRIMARY,
							],
				'bordered' => true,
				'striped' => false,
				'condensed' => false,
				'responsive' =>true,
				'hover' => true,
				'fadeDelay'=>800,
				'enableEditMode'=>false,
			])
		
    ?>

</div>
