<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\VISTAMOVIMIENTO */

$this->title = 'Create Vistamovimiento';
$this->params['breadcrumbs'][] = ['label' => 'Vistamovimientos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vistamovimiento-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
