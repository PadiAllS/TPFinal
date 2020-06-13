<?php

namespace app\modules\apiv1\models;

use app\models\Especialidad as ModelsEspecialidad;
use yii\behaviors\TimestampBehavior;

class Especialidad extends ModelsEspecialidad
{
    
    public function fields()
    {
        return ['id_especialidad', 'nombre', 'detalle','created_at'];
    }
    
    public function estraFields()
    {
        return [''];
    }
}
