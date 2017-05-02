<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DOCUMENTO */

$this->title = $model->ID_DOCUMENTO;
$this->params['breadcrumbs'][] = ['label' => 'Documentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="documento-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ID_DOCUMENTO], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ID_DOCUMENTO], [
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
            'ID_DOCUMENTO',
            'ID_SOLICITANTE',
            'ID_TIPO_DOCUMENTO',
            'ID_TIPO_SOLICITUD',
            'ID_ORGANISMO',
            'ID_BANCO',
            'NUM_DOCUMENTO',
            'FECHA_CREACION',
            'NUM_OFICIO',
            'ID_ESTATUS',
            'ID_USUARIO',
            'OBSERVACIONES',
            'FECHA_MODIFICACION',
            'ID_ABOGADO',
        ],
    ]) ?>

</div>
