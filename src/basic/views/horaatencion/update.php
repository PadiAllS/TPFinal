<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Horaatencion */

$this->title = 'Update Horaatencion: ' . $model->id_hatencion;
$this->params['breadcrumbs'][] = ['label' => 'Horaatencions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_hatencion, 'url' => ['view', 'id' => $model->id_hatencion]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="horaatencion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
