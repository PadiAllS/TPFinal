<?php

namespace app\modules\apiv1\models;


class Medico extends \app\models\Medico
{
    public function fields()
    {
        return ['id', 'nombre', 'apellido','direccion','telefono','celular','fecha_nacimiento','sexo','tipo_doc','matricula'];
    }
    
    public function estraFields()
    {
        return ['especialidad_id'];
    }
}
