<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii2mod\user\models\enums\UserStatus;

/* @var $this yii\web\View */
/* @var $model app\models\UserModel */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
?>
?>

<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Consultoria</b>BANAIVIH</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Inicio de Sesión</p>

    <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false]); ?>
      <div class="form-group has-feedback">
		<?= $form
            ->field($model, 'username', $fieldOptions1)
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('username')]) ?>
        <!--<input type="email" class="form-control" placeholder="Email">-->
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
		  <?= $form
            ->field($model, 'plainPassword', $fieldOptions2)
            ->label(false)
            ->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>
        <!--<input type="password" class="form-control" placeholder="Password">-->
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
				<?= $form->field($model, 'rememberMe')->checkbox() ?>
              <!--<input type="checkbox"> Remember Me-->
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
			<?= Html::submitButton('Ingresar', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
          <!--<button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>-->
        </div>
        <!-- /.col -->
      </div>
    <?php ActiveForm::end(); ?>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
