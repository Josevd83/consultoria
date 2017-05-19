<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\VISTAMOVIMIENTO */

$this->title = $model->ID_MOVIMIENTO;
$this->params['breadcrumbs'][] = ['label' => 'Vistamovimientos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vistamovimiento-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ID_MOVIMIENTO], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ID_MOVIMIENTO], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID_MOVIMIENTO',
            'ID_DOCUMENTO',
            'ID_ESTATUS',
            'ID_DEPARTAMENTO',
            'ID_USUARIO',
            'ID_SOLICITANTE',
            'ID_TIPO_MOVIMIENTO',
            'ID_TIPO_DOCUMENTO',
            'ID_PASO',
            'NRO_PASO',
            'DESCRIPCION_PASO',
            'OBSERVACIONES',
            'FECHA_CREACION',
            'FECHA_MODIFICACION',
            'ID_TIPO_SOLICITUD',
            'ID_ORGANISMO',
            'ID_BANCO',
            'ID_ABOGADO',
        ],
    ]) ?>

</div>
