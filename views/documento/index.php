<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\TIPODOCUMENTO;
use app\models\TIPOSOLICITUD;
use app\models\SOLICITANTE;
use app\models\ABOGADO;
use yii\widgets\Pjax;
use yii\web\View;
use kartik\widgets\Growl;
/* @var $this yii\web\View */
/* @var $searchModel app\models\DOCUMENTOSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
//var_dump($this->params);
$this->title = 'Documentos';
$this->params['breadcrumbs'][] = $this->title;
//$this->params['breadcrumbs'][] = ['label' => 'Documentos', 'url' => ['index']];
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

<div class="documento-index">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Nuevo Documento', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php /*= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID_DOCUMENTO',
            'ID_SOLICITANTE',
            'ID_TIPO_DOCUMENTO',
            'ID_TIPO_SOLICITUD',
            'ID_ORGANISMO',
            // 'ID_BANCO',
            // 'NUM_DOCUMENTO',
            // 'FECHA_CREACION',
            // 'NUM_OFICIO',
            // 'ID_ESTATUS',
            // 'ID_USUARIO',
            // 'OBSERVACIONES',
            // 'FECHA_MODIFICACION',
            // 'ID_ABOGADO',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); */ ?>
<?php Pjax::begin(); ?>
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
							'NUM_DOCUMENTO',
							//'ID_SOLICITANTE',
							[
								'attribute'=>'ID_SOLICITANTE',
								'label'=>'Cédula del Solicitante',
								'enableSorting' => true,
								'vAlign'=>'middle',
								'value'=>function ($model, $key, $index, $widget) { 
									//return Html::a($model->tipoDocumento->DESCRIPCION, '#', ['title'=>'View author detail', 'onclick'=>'alert("This will open the author page.\n\nDisabled for this demo!")']);
									return $model->solicitante->CEDULA;
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
								'template'=>'{view}{update}{delete}',
								'buttons'=>[
												'delete' => function ($url, $model) {
																  return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url,

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
															 }
										   ],
							],
							[
								'class'=>'kartik\grid\CheckboxColumn',
								'headerOptions'=>['class'=>'kartik-sheet-style'],
							],
					   ]
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
				Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'],['title'=>'Crear Nuevo Documento', 'class'=>'btn btn-success']) . ' '.
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

<?php Pjax::end(); ?>
</div>

<?php
$this->registerJsFile(
    '@web/js/gridTramite.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);
?>
