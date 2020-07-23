<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Obrasocial */

$this->title = 'Update Obrasocial: ' . $model->id_obra_social;
$this->params['breadcrumbs'][] = ['label' => 'Obrasocials', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_obra_social, 'url' => ['view', 'id' => $model->id_obra_social]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="obrasocial-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
