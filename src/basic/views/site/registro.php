<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="container bg-info bv-example-row text-center text-light">
    <div class="col-8 container-fluid">

<h3><?= $msg ?></h3>

<h1>Registro de usuarios </h1>
<?php $form = ActiveForm::begin([
    'method' => 'post',
 'id' => 'formulario',
 'enableClientValidation' => false,
 'enableAjaxValidation' => true,
]);
?>
<div class="form-group">
 <?= $form->field($model, "username")->input("text") ?>   
</div>
<div class="form-group">
 <?= $form->field($model, "name")->input("text") ?>   
</div>
<div class="form-group">
 <?= $form->field($model, "email")->input("email") ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "password")->input("password") ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "password_repeat")->input("password") ?>   
</div>

<?= Html::submitButton("Register", ["class" => "btn btn-primary"]) ?>

<?php $form->end() ?>


    </div>