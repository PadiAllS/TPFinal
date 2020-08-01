<?php

namespace app\modules\apiv1\models;

use app\models\Medicoatencion as ModelsMedicoatencion;
use yii\behaviors\TimestampBehavior;

class Medicoatencion extends ModelsMedicoatencion
{

    public function fields()
    {
        return ['id_medicoatencion', 'medico_id', 'hatencion_id', 'medico', 'hora_atencion'];
    }

    public function estraFields()
    {
        return ['medico_id', 'hatencion_id'];
    }

    public function getMedico()
    {
        return $this->hasOne(Medico::className(), ['id_medico' => 'medico_id']);
    }

    public function getHoraatencion()
    {
        return $this->hasOne(Horaatencion::className(), ['id_hatencion' => 'hatencion_id']);
    }
}
