<?php

namespace app\modules\apiv1\models;

use app\models\Horaatencion;
use app\models\Medicoatencion;
use yii\data\ActiveDataProvider;


class Medico extends \app\models\Medico
{
    public function fields()
    {
        return ['id_medico', 'nombre', 'apellido', 'direccion', 'telefono', 'celular', 'fecha_nacimiento', 'sexo', 'tipo_doc', 'matricula', 'especialidad','horarios'];
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
