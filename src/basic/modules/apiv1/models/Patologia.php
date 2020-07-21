<?php

namespace app\modules\apiv1\models;

use app\models\Patologia as ModelsPatologia;
use yii\behaviors\TimestampBehavior;

class Patologia extends ModelsPatologia
{
    
    public function fields()
    {
        return ['id_patologia', 'nombre', 'detalle'];
    }
    
    public function estraFields()
    {
        return [''];
    }
}
