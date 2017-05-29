<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\SOLICITANTE;
use app\models\TIPODOCUMENTO;
use app\models\TIPOSOLICITUD;
use app\models\DOCUMENTO;
use app\models\ABOGADO;
use app\models\ESTATUS;
use app\models\TIPODOCUMENTOPASOS;
use yii\web\View;
use kartik\widgets\Growl;
//use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VISTAMOVIMIENTOSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Listado de Documentos';
$this->params['breadcrumbs'][] = $this->title;
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

<div class="vistamovimiento-index">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <p>
        <?= Html::a('Crear Nuevo Documento', ['documento/create'], ['class' => 'btn btn-success']) ?>
    </p>
    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
    <?php 
		$gridColumns = [
							//'ID_DOCUMENTO',
							[
								'class'=>'kartik\grid\ExpandRowColumn',
								'width'=>'50px',
								'value'=>function ($model, $key, $index, $column) {
									return GridView::ROW_COLLAPSED;
								},
								'detail'=>function ($model, $key, $index, $column) {
									return Yii::$app->controller->renderPartial('_view', ['model'=>$model]);
								},
								'headerOptions'=>['class'=>'kartik-sheet-style'] ,
								'expandOneOnly'=>true
							],
							//'NUM_DOCUMENTO',
							[
								'attribute'=>'ID_DOCUMENTO',
								'label'=>'Número del Documento',
								'enableSorting' => true,
								'vAlign'=>'middle',
								'value'=>function ($model, $key, $index, $widget) { 
									//return Html::a($model->tipoDocumento->DESCRIPCION, '#', ['title'=>'View author detail', 'onclick'=>'alert("This will open the author page.\n\nDisabled for this demo!")']);
									return $model->documento->NUM_DOCUMENTO;
								},
								'filterType'=>GridView::FILTER_SELECT2,
								'filter'=>ArrayHelper::map(DOCUMENTO::find()->orderBy('ID_DOCUMENTO DESC')->asArray()->all(), 'ID_DOCUMENTO', 'NUM_DOCUMENTO'), 
								'filterWidgetOptions'=>[
									'pluginOptions'=>['allowClear'=>true],
								],
								'filterInputOptions'=>['placeholder'=>'Seleccione'],
								'format'=>'raw',
							],
							//'ID_SOLICITANTE',
							[
								'attribute'=>'ID_SOLICITANTE',
								'label'=>'Cédula del Solicitante',
								'enableSorting' => true,
								'vAlign'=>'middle',
								'value'=>function ($model, $key, $index, $widget) { 
									//return Html::a($model->tipoDocumento->DESCRIPCION, '#', ['title'=>'View author detail', 'onclick'=>'alert("This will open the author page.\n\nDisabled for this demo!")']);
									return $model->solicitante->CEDULA;
									//return 123;
								},
								'filterType'=>GridView::FILTER_SELECT2,
								'filter'=>ArrayHelper::map(SOLICITANTE::find()->orderBy('CEDULA')->asArray()->all(), 'ID_SOLICITANTE', 'CEDULA'), 
								'filterWidgetOptions'=>[
									'pluginOptions'=>['allowClear'=>true],
								],
								'filterInputOptions'=>['placeholder'=>'Seleccione'],
								'format'=>'raw',
							],
							//'ID_TIPO_DOCUMENTO',
							[
								'attribute'=>'ID_TIPO_DOCUMENTO',
								'vAlign'=>'middle',
								//'width'=>'180px',
								'value'=>function ($model, $key, $index, $widget) { 
									//return Html::a($model->tipoDocumento->DESCRIPCION, '#', ['title'=>'View author detail', 'onclick'=>'alert("This will open the author page.\n\nDisabled for this demo!")']);
									return $model->tipoDocumento->DESCRIPCION;
								},
								'filterType'=>GridView::FILTER_SELECT2,
								'filter'=>ArrayHelper::map(TIPODOCUMENTO::find()->orderBy('DESCRIPCION')->asArray()->all(), 'ID_TIPO_DOCUMENTO', 'DESCRIPCION'), 
								'filterWidgetOptions'=>[
									'pluginOptions'=>['allowClear'=>true],
								],
								'filterInputOptions'=>['placeholder'=>'Seleccione'],
								'format'=>'raw',
							],
							[
								'attribute'=>'ID_TIPO_SOLICITUD',
								'vAlign'=>'middle',
								//'width'=>'180px',
								'value'=>function ($model, $key, $index, $widget) { 
									//return $model->documento->ID_DOCUMENTO;
									return $model->tipoSolicitud->DESCRIPCION;
								},
								'filterType'=>GridView::FILTER_SELECT2,
								'filter'=>ArrayHelper::map(TIPOSOLICITUD::find()->orderBy('DESCRIPCION')->asArray()->all(), 'ID_TIPO_SOLICITUD', 'DESCRIPCION'), 
								'filterWidgetOptions'=>[
									'pluginOptions'=>['allowClear'=>true],
								],
								'filterInputOptions'=>['placeholder'=>'Seleccione'],
								'format'=>'raw',
							],
							[
								'attribute'=>'ID_ABOGADO',
								'vAlign'=>'middle',
								'label'=>'Cédula del Abogado',
								'enableSorting'=>true,
								//'width'=>'180px',
								'value'=>function ($model, $key, $index, $widget) { 
									return $model->abogado->CEDULA;
								},
								'filterType'=>GridView::FILTER_SELECT2,
								'filter'=>ArrayHelper::map(ABOGADO::find()->orderBy('CEDULA')->asArray()->all(), 'ID_ABOGADO', 'CEDULA'), 
								'filterWidgetOptions'=>[
									'pluginOptions'=>['allowClear'=>true],
								],
								'filterInputOptions'=>['placeholder'=>'Seleccione'],
								'format'=>'raw',
							],
							[
								'attribute'=>'ID_ESTATUS',
								'vAlign'=>'middle',
								'label'=>'Estatus',
								'enableSorting'=>true,
								//'width'=>'180px',
								'value'=>function ($model, $key, $index, $widget) { 
									return $model->estatus->DESCRIPCION;
								},
								'filterType'=>GridView::FILTER_SELECT2,
								'filter'=>ArrayHelper::map(ESTATUS::find()->orderBy('DESCRIPCION')->asArray()->all(), 'ID_ESTATUS', 'DESCRIPCION'), 
								'filterWidgetOptions'=>[
									'pluginOptions'=>['allowClear'=>true],
								],
								'filterInputOptions'=>['placeholder'=>'Seleccione'],
								'format'=>'raw',
							],
							[
								'attribute'=>'DESCRIPCION_PASO',
								'vAlign'=>'middle',
								'label'=>'Estatus',
								'enableSorting'=>true,
								//'width'=>'180px',
								'value'=>function ($model, $key, $index, $widget) { 
									return $model->DESCRIPCION_PASO;
								},
								'filterType'=>GridView::FILTER_SELECT2,
								'filter'=>ArrayHelper::map(TIPODOCUMENTOPASOS::find()->orderBy('DESCRIPCION_PASO')->asArray()->all(), 'ID_PASO', 'DESCRIPCION_PASO'), 
								'filterWidgetOptions'=>[
									'pluginOptions'=>['allowClear'=>true],
								],
								'filterInputOptions'=>['placeholder'=>'Seleccione'],
								'format'=>'raw',
							],
							//'ID_TIPO_SOLICITUD',
							//'ID_ORGANISMO',
							[
								'class'=>'kartik\grid\ActionColumn',
								//'dropdown'=>$this->dropdown,
								//'dropdownOptions'=>['class'=>'pull-right'],
								//'urlCreator'=>function($action, $model, $key, $index) { return '#'; },
								'viewOptions'=>['title'=>'Ver Detalle', 'data-toggle'=>'tooltip'],
								'updateOptions'=>['title'=>'Modificar el Documento', 'data-toggle'=>'tooltip'],
								'deleteOptions'=>['title'=>'Eliminar Documento', 'data-toggle'=>'tooltip'],
								'headerOptions'=>['class'=>'kartik-sheet-style'],
								//'template'=>'{view}{update}{delete}{cambiarPaso}',
								'template'=>'{cambiarPaso} {delete}',
								'buttons'=>[
												'delete' => function ($url, $model) {
																  //return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url,
																  return Html::a('<span class="glyphicon glyphicon-trash"></span>', Url::to(['documento/delete','id'=>$model->ID_DOCUMENTO]),

																	  [  
																		 //'title' => Yii::t('yii', 'delete'),
																		 'title'=> "Eliminar Documento",
																		 'id'=>'eliminarDoc',
																		 //'data-confirm' => "Are you sure you want to delete this item?",
																		 'data-method' => 'post',
																		 //'data-pjax' => true,
																		 //'data-pjax-container'=>"kv-grid-demo-pjax",
																		 //'data-toggle'=>"tooltip"
																	  ]);
															 },
												'cambiarPaso' => function($url, $model){
													
															switch (TIPODOCUMENTOPASOS::enviarDevolver($model->ID_MOVIMIENTO)){
																case 1:
																	return Html::a('<span class="glyphicon glyphicon-eye-open"></span>',Url::to(['movimiento/view', 'id' => $model->ID_MOVIMIENTO]),['title'=>"Ver Detalle"])." ".
																		   Html::a('<span class="fa fa-hand-o-right"></span>',Url::to(['movimiento/enviar', 'id' => $model->ID_MOVIMIENTO]),[
																				'title'=>"Aprobar y Enviar",
																				'id' => 'enviarDoc',
																				'data-method' => 'post'
																			]);
																break;
																case 2:
																	//return Html::a('<span class="glyphicon glyphicon-eye-open"></span>',Url::to(['movimiento/recibido', 'id' => $model->ID_MOVIMIENTO]),['title'=>"Ver Detalle",'target'=>'_blank']);
																	return Html::a('<span class="fa fa-download"></span>',Url::to(['movimiento/recibido', 'id' => $model->ID_MOVIMIENTO]),
																	[
																		'title'=>"Recibir Documento",
																		//'target'=>'_blank',
																		'id' => 'recibirDoc',
																		'data-method' => 'post'
																	]);
																break;
																case 3:
																	return Html::a('<span class="glyphicon glyphicon-eye-open"></span>',Url::to(['movimiento/view', 'id' => $model->ID_MOVIMIENTO]),['title'=>"Ver Detalle"])." ".
																		   Html::a('<span class="fa fa-thumbs-o-up"></span>',Url::to(['movimiento/enviar', 'id' => $model->ID_MOVIMIENTO]),
																		   [
																				'title'=>"Aprobar y Enviar",
																				'id' => 'enviarDoc',
																				'data-method' => 'post'
																			])." ".
																		   Html::a('<span class="fa fa-thumbs-o-down"></span>',Url::to(['movimiento/devolver', 'id' => $model->ID_MOVIMIENTO]),['title'=>"Rechazar y Devolver"]);
																break;
																case 4:
																	return Html::a('<span class="glyphicon glyphicon-eye-open"></span>',Url::to(['movimiento/view', 'id' => $model->ID_MOVIMIENTO]),['title'=>"Ver Detalle"]);
																break;
																case 5:
																	return Html::a('<span class="glyphicon glyphicon-eye-open"></span>',Url::to(['movimiento/view', 'id' => $model->ID_MOVIMIENTO]),['title'=>"Ver Detalle"])." ".
																		   Html::a('<span class="fa fa-thumbs-o-up"></span>',Url::to(['movimiento/enviar', 'id' => $model->ID_MOVIMIENTO]),
																		   [
																				'title'=>"Aprobar y Enviar",
																				'id' => 'enviarDoc',
																				'data-method' => 'post'
																			])." ".
																		   Html::a('<span class="fa fa-thumbs-o-down"></span>',Url::to(['movimiento/devolver', 'id' => $model->ID_MOVIMIENTO]),['title'=>"Rechazar y Devolver"])." ".
																		   Html::a('<span class="glyphicon glyphicon-pencil"></span>',Url::to(['documento/modificar', 'id' => $model->ID_DOCUMENTO, 'movimiento'=>$model->ID_MOVIMIENTO]),['title'=>"Modificar"]);
																break;
																default:
																	return '';
															}
													
																	
															 },
										   ],
							],
							[
								'class'=>'kartik\grid\CheckboxColumn',
								'headerOptions'=>['class'=>'kartik-sheet-style'],
							],
					   ];
	?>
    <?= GridView::widget([
			'id' => 'kv-grid-demo',
			'dataProvider'=> $dataProvider,
			'filterModel' => $searchModel,
			'columns' => $gridColumns,
			'responsive'=>true,
			'hover'=>true,
			'containerOptions'=>['style'=>'overflow: auto'], // only set when $responsive = false
			'headerRowOptions'=>['class'=>'kartik-sheet-style'],
			'filterRowOptions'=>['class'=>'kartik-sheet-style'],
			'pjax'=>true, // pjax is set to always true for this demo
			'pjaxSettings'=>[
				'neverTimeout'=>false,
				//'beforeGrid'=>'My fancy content before.',
				//'afterGrid'=>'My fancy content after.',
			],
			'toolbar'=> [
				['content'=>
					Html::a('<i class="glyphicon glyphicon-plus"></i>', ['documento/create'],['title'=>'Crear Nuevo Documento', 'class'=>'btn btn-success']) . ' '.
					//Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'],['title'=>'Crear Nuevo Documento', 'class'=>'btn btn-success']) . ' '.
					//Html::button('<i class="glyphicon glyphicon-plus"></i>', ['type'=>'button', 'title'=>'Crear Nuevo Documento', 'class'=>'btn btn-success', 'onclick'=>'alert("This will launch the book creation form.\n\nDisabled for this demo!");']) . ' '.
					//Html::button('<i class="glyphicon glyphicon-repeat"></i>', ['type'=>'button', 'data-pjax'=>0, 'class'=>'btn btn-default', 'title'=>'Refrescar', 'id'=>'refrescar']).
					//Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['grid-demo'], ['data-pjax'=>0, 'class'=>'btn btn-default', 'title'=>'Agregar'])
					Html::button('<i class="glyphicon glyphicon-repeat"></i>', ['type'=>'button', 'title'=>'Agregar', 'class'=>'btn btn-default', 'onclick'=>"
					$.pjax.reload({container:'#kv-grid-demo-pjax'});
					"])
				],
				'{export}',
				'{toggleData}',
			],
				'export'=>[
			'fontAwesome'=>true
			],
			'bordered'=>true,
			'striped'=>true,
			'condensed'=>true,
			'responsive'=>true,
			'hover'=>true,
			'showPageSummary'=>true,
			'panel'=>[
			'type'=>GridView::TYPE_PRIMARY,
			'heading'=>'<i class="glyphicon glyphicon-book"></i>  Documentos',
			],
			'persistResize'=>false,
			'exportConfig'=>true,
		]);
    ?>
</div>

<?php
$this->registerJsFile(
    '@web/js/gridTramite.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);
?>

<?php $script = "$('body').on('click', '#recibirDoc', function(e) {
       var url = $(this).attr('href') ,row = $(this).closest('tr'), cell = $(this).closest('td');
		$.ajax({
							url: url,
                            type: 'post',
                            //dataType: 'text',
                            beforeSend: function() {
                                row.addClass('kv-delete-row');
                                cell.addClass('kv-delete-cell');
                            },
                            complete: function () {
                                row.removeClass('kv-delete-row');
                                cell.removeClass('kv-delete-cell');
                            },
                            error: function (xhr, status, error) {
                                //krajeeDialog.alert('There was an error with your request.' + xhr.responseText);
                                krajeeDialog.alert('Hubo un error');
                            },
                            success: function(data){
								var dialog = new BootstrapDialog({
									message: 'Documento recibido exitósamente '+ data,
									type: BootstrapDialog.TYPE_INFO,
									title: 'Información',
									closable: false,
									//dialogRef.setClosable(false);
									buttons: [
									{
										id: 'btn-1',
										label: 'Cerrar',
										action: function(dialogItself){
											dialogItself.close();
											$.pjax.reload({container: '#kv-grid-demo-pjax'});
										}
									}]
								});
								dialog.open();
					
							}
                        }).done(function (data) {

                        });	
			return false;
    });
    
    $('body').on('click', '#enviarDoc', function(e) {
       var url = $(this).attr('href') ,row = $(this).closest('tr'), cell = $(this).closest('td');
		$.ajax({
							url: url,
                            type: 'post',
                            //dataType: 'text',
                            beforeSend: function() {
                                row.addClass('kv-delete-row');
                                cell.addClass('kv-delete-cell');
                            },
                            complete: function () {
                                row.removeClass('kv-delete-row');
                                cell.removeClass('kv-delete-cell');
                            },
                            error: function (xhr, status, error) {
                                //krajeeDialog.alert('There was an error with your request.' + xhr.responseText);
                                krajeeDialog.alert('Hubo un error');
                            },
                            success: function(data){
								var dialog = new BootstrapDialog({
									message: 'Documento enviado exitósamente.',
									type: BootstrapDialog.TYPE_INFO,
									title: 'Información',
									closable: false,
									buttons: [
									{
										id: 'btn-1',
										label: 'Cerrar',
										action: function(dialogItself){
											dialogItself.close();
											$.pjax.reload({container: '#kv-grid-demo-pjax'});
										}
									}]
								});
								dialog.open();
					
							}
                        }).done(function (data) {

                        });	
			return false;
    });"; 
?>
<?php $this->registerJs($script,View::POS_END); ?>
