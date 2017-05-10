<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DOCUMENTOSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Documentos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="documento-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Documento', ['create'], ['class' => 'btn btn-success']) ?>
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

    <?= GridView::widget([
	    'id' => 'kv-grid-demo',
	    'dataProvider'=> $dataProvider,
	    'filterModel' => $searchModel,
	    'columns' => [
		    'ID_DOCUMENTO',
		    'NUM_DOCUMENTO',
		    'ID_SOLICITANTE',
		    'ID_TIPO_DOCUMENTO',
		    'ID_TIPO_SOLICITUD',
		    'ID_ORGANISMO',
	    ],
	    'responsive'=>true,
	    'hover'=>true,
	    'containerOptions'=>['style'=>'overflow: auto'], // only set when $responsive = false
	    'headerRowOptions'=>['class'=>'kartik-sheet-style'],
            'filterRowOptions'=>['class'=>'kartik-sheet-style'],
            'pjax'=>true, // pjax is set to always true for this demo
            'toolbar'=> [
		['content'=>
		    Html::button('<i class="glyphicon glyphicon-plus"></i>', ['type'=>'button', 'title'=>'Agregar', 'class'=>'btn btn-success', 'onclick'=>'alert("This will launch the book creation form.\n\nDisabled for this demo!");']) . ' '.
		    Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['grid-demo'], ['data-pjax'=>0, 'class'=>'btn btn-default', 'title'=>'Agregar'])
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
