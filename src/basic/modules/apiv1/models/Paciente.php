<?php

namespace app\modules\apiv1\models;



class Paciente extends \app\models\Paciente
{

    public function fields()
    {
        return ['patologias', 'id_paciente', 'nombre', 'apellido',  'direccion', 'nro_doc', 'telefono', 'nro_doc', 'celular', 'sexo', 'num_afil'];
    }

    public function extraFields()
    {
        return ['obra_social_id'];
    }
    public function getPatologias()
    {
        return $this->hasMany(Patologia::class, ['id_patologia' => 'patologia_id'])->viaTable(Pacientepatologia::tableName(), ['paciente_id' => 'id_paciente']);
    }
    public function getObraSocial()
    {
        return $this->hasOne(Obrasocial::className(), ['id_obra_social' => 'obra_social_id']);
    }
}
