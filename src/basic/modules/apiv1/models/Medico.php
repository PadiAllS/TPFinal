<?php

namespace app\modules\apiv1\models;


class Medico extends \app\models\Medico
{
    public function fields()
    {
        return ['horarios',  'id_medico', 'nombre', 'apellido', 'direccion', 'telefono', 'celular', 'fecha_nacimiento', 'sexo', 'tipo_doc', 'matricula', 'especialidad'];
    }

    public function extraFields()
    {
        return ['especialidad_id'];
    }

    public function getHorarios()
    {
        return $this->hasMany(Horaatencion::class, ['id_hatencion' => 'hatencion_id'])->viaTable(Medicoatencion::tableName(), ['medico_id' => 'id_medico']);
    }

    public function getEspecialidad()
    {
        return $this->hasOne(Especialidad::className(), ['id_especialidad' => 'especialidad_id']);
    }
}
