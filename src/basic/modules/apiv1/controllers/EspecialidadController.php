<?php

namespace app\modules\apiv1\controllers;

//use yii\web\Controller;

use app\modules\apiv1\models\Especialidad;
use yii\rest\ActiveController;

/**
 * Default controller for the `apiv1` module
 */
class EspecialidadController extends DefaultController
{
    public $modelClass = Especialidad::class;
}
