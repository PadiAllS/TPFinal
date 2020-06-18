<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "medico".
 *
 * @property int $id_medico
 * @property string|null $nombre
 * @property string|null $apellido
 * @property string|null $direccion
 * @property int|null $telefono
 * @property int|null $celular
 * @property string|null $fecha_nacimiento
 * @property string|null $sexo
 * @property string|null $tipo_doc
 * @property string|null $nro_doc
 * @property string|null $matricula
 * @property int|null $especialidad_id
 * @property int|null $created_by
 * @property int|null $created_at
 * @property int|null $updated_by
 * @property int|null $updated_at
 *
 * @property Especialidad $especialidad
 * @property Turnos[] $turnos
 */
class Medico extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'medico';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['telefono', 'celular', 'especialidad_id', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
            [['fecha_nacimiento'], 'safe'],
            [['sexo', 'tipo_doc'], 'string'],
            [['nombre', 'apellido', 'direccion', 'matricula'], 'string', 'max' => 250],
            [['nro_doc'], 'string', 'max' => 45],
            [['especialidad_id'], 'exist', 'skipOnError' => true, 'targetClass' => Especialidad::className(), 'targetAttribute' => ['especialidad_id' => 'id_especialidad']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_medico' => 'Id Medico',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'direccion' => 'Direccion',
            'telefono' => 'Telefono',
            'celular' => 'Celular',
            'fecha_nacimiento' => 'Fecha Nacimiento',
            'sexo' => 'Sexo',
            'tipo_doc' => 'Tipo Doc',
            'nro_doc' => 'Nro Doc',
            'matricula' => 'Matricula',
            'especialidad_id' => 'Especialidad ID',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Especialidad]].
     *
     * @return \yii\db\ActiveQuery|EspecialidadQuery
     */
    public function getEspecialidad()
    {
        return $this->hasOne(Especialidad::className(), ['id_especialidad' => 'especialidad_id']);
    }

    /**
     * Gets query for [[Turnos]].
     *
     * @return \yii\db\ActiveQuery|TurnosQuery
     */
    public function getTurnos()
    {
        return $this->hasMany(Turnos::className(), ['medico_id' => 'id_medico']);
    }

    /**
     * {@inheritdoc}
     * @return MedicoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MedicoQuery(get_called_class());
    }
}
