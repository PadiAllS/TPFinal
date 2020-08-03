<?php

namespace app\modules\apiv1\models;

use app\models\Pacientepatologia as ModelsPacientepatologia;
use yii\behaviors\TimestampBehavior;

class Pacientepatologia extends ModelsPacientepatologia
{

    public function fields()
    {
        return ['id_paciente_patologia', 'paciente_id', 'patologia_id'];
    }

    public function estraFields()
    {
        return ['paciente_id', 'patologia_id'];
    }

    public function getPaciente()
    {
        return $this->hasOne(Paciente::className(), ['id_paciente' => 'paciente_id']);
    }

    public function getPatologia()
    {
        return $this->hasOne(Patologia::className(), ['id_patologia' => 'patologia_id']);
    }
}
