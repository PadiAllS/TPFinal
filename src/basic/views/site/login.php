<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="container bg-info bv-example-row text-center text-light">
    <div class="col-8 container-fluid">
        <div class="site-login">
            <h1><?= Html::encode($this->title) ?></h1>

            <p>Complete los siguientes campos para iniciar sesión:</p>
            <div class="row">
                <div class="col-lg-12">
                    <?php $form = ActiveForm::begin([
                        'id' => 'login-form',
                        'layout' => 'horizontal',
                        // 'fieldConfig' => [
                        //     'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                        //     'labelOptions' => ['class' => 'col-lg-1 control-label'],
                        // ],
                    ]); ?>

                    <div>

                    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>


                    </div>
                    <div>

                    <?= $form->field($model, 'password')->passwordInput() ?>

                    <?= $form->field($model, 'rememberMe')->checkbox([
                        'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
                    ]) ?>
                    <div>
                        <a class="" href="http://localhost:8000/site/recoverpass">Recuperar password</a>
                    </div>

                    </div>

                    <div class="form-group">
                        <div class="col-lg-offset-1 col-lg-11">
                            <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                        </div>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>

        </div>
    </div>