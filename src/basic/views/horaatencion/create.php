<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Horaatencion */

$this->title = 'Create Horaatencion';
$this->params['breadcrumbs'][] = ['label' => 'Horaatencions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="horaatencion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
