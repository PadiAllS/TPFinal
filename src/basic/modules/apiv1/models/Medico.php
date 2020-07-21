<?php

namespace app\modules\apiv1\models;


class Medico extends \app\models\Medico
{
    public function fields()
    {
        return ['id_medico', 'nombre', 'apellido','direccion','telefono','celular','fecha_nacimiento','sexo','tipo_doc','matricula','especialidad'];
    }
    
    public function estraFields()
    {
        return ['especialidad_id'];
    }

    public function getEspecialidad()
    {
        return $this->hasOne(Especialidad::className(), ['id_especialidad' => 'especialidad_id']);
    }
}
