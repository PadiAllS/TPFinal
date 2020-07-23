<?php

namespace app\modules\apiv1\models;

use app\models\Obrasocial as ModelsObrasocial;
use yii\behaviors\TimestampBehavior;

class Obrasocial extends ModelsObrasocial
{

    public function fields()
    {
        return ['id_obra_social', 'nombre', 'telefono'];
    }

    public function extraFields()
    {
        return [''];
    }
}
