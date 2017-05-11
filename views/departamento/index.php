<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DepartamentoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
//var_dump($this->params);
$this->title = 'Departamentos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="departamento-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Departamento', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID_DEPARTAMENTO',
            'DESCRIPCION',
            'GERENCIA',

            ['class' => 'yii\grid\ActionColumn'],
        ],
'tableOptions' => ['class'=>'table table-striped table-bordered DataTable'],
'options' => ['class'=>'box-body'],
    ]); ?>
</div>


<?=
\yiister\adminlte\widgets\grid\GridView::widget(
    [
        "dataProvider" => $dataProvider,
        "condensed" => true,
        "hover" => true,
    ]
);
?>
