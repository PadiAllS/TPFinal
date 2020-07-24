<?php

namespace app\modules\apiv1\models;

use app\models\Obrasocial as ModelsObraSocial;
use yii\behaviors\TimestampBehavior;

class Obrasocial extends ModelsObraSocial
{

    public function fields()
    {
        return ['id_obra_social', 'nombre', 'telefono', 'celular', 'contacto', 'reintegro'];
    }

    public function extraFields()
    {
        return [''];
    }
}
