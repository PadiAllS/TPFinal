<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Medicoatencion */

$this->title = 'Update Medicoatencion: ' . $model->id_medicoatencion;
$this->params['breadcrumbs'][] = ['label' => 'Medicoatencions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_medicoatencion, 'url' => ['view', 'id' => $model->id_medicoatencion]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="medicoatencion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
