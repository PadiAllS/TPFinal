<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pacientepatologia */

$this->title = 'Update Pacientepatologia: ' . $model->id_paciente_patologia;
$this->params['breadcrumbs'][] = ['label' => 'Pacientepatologias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_paciente_patologia, 'url' => ['view', 'id' => $model->id_paciente_patologia]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pacientepatologia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
