<?php

namespace app\modules\apiv1\models;

use app\models\Horaatencion as ModelsHoraatencion;
use yii\behaviors\TimestampBehavior;

class Horaatencion extends ModelsHoraatencion
{

    public function fields()
    {
        return ['id_hatencion', 'dia', 'desde', 'hasta'];
    }

    public function estraFields()
    {
        return [''];
    }
}
