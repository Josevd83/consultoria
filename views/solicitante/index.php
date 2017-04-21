<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SOLICITANTESearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Solicitantes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="solicitante-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Solicitante', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID_SOLICITANTE',
            'NACIONALIDAD',
            'CEDULA',
            'PRIMER_NOMBRE',
            'SEGUNDO_NOMBRE',
            // 'PRIMER_APELLIDO',
            // 'SEGUNDO_APELLIDO',
            // 'COD_TELEFONO',
            // 'NRO_TELEFONO',
            // 'CORREO_ELECTRONICO',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
