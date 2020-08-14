<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
 
<h3><?= $msg ?></h3>

<div class="container bg-info bv-example-row text-center text-light">
    <div class="col-8 container-fluid">
 
<h1>Recuperar Password</h1>
<?php $form = ActiveForm::begin([
    'method' => 'post',
    'enableClientValidation' => true,
]);
?>
 
<div class="form-group">
 <?= $form->field($model, "email")->input("email") ?>  
</div>
 
<?= Html::submitButton("Recover Password", ["class" => "btn btn-primary"]) ?>
 
<?php $form->end() ?>

    </div>
</div>