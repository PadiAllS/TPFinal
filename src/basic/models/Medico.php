<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "medico".
 *
 * @property int $id_medico
 * @property string $nombre
 * @property string $apellido
 * @property string $direccion
 * @property string $localidad
 * @property string|null $codpos
 * @property string|null $telefono
 * @property string $celular
 * @property string $fecha_nacimiento
 * @property string $sexo
 * @property string $tipo_doc
 * @property string $nro_doc
 * @property string $mail
 * @property string $matricula
 * @property int $especialidad_id
 * @property int|null $created_by
 * @property int|null $created_at
 * @property int|null $updated_by
 * @property int|null $updated_at
 *
 * @property Especialidad $especialidad
 * @property MedicoAtencion[] $medicoAtencions
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
            [['nombre', 'apellido', 'direccion', 'localidad', 'celular', 'fecha_nacimiento', 'sexo', 'tipo_doc', 'nro_doc', 'mail', 'matricula', 'especialidad_id'], 'required'],
            [['fecha_nacimiento'], 'safe'],
            [['especialidad_id', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
            [['nombre', 'apellido', 'direccion', 'localidad', 'mail', 'matricula'], 'string', 'max' => 100],
            [['codpos', 'sexo', 'tipo_doc'], 'string', 'max' => 20],
            [['telefono', 'celular', 'nro_doc'], 'string', 'max' => 30],
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
            'localidad' => 'Localidad',
            'codpos' => 'Codpos',
            'telefono' => 'Telefono',
            'celular' => 'Celular',
            'fecha_nacimiento' => 'Fecha Nacimiento',
            'sexo' => 'Sexo',
            'tipo_doc' => 'Tipo Doc',
            'nro_doc' => 'Nro Doc',
            'mail' => 'Mail',
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
     * @return \yii\db\ActiveQuery
     */
    public function getEspecialidad()
    {
        return $this->hasOne(Especialidad::className(), ['id_especialidad' => 'especialidad_id']);
    }

    /**
     * Gets query for [[MedicoAtencions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMedicoAtencions()
    {
        return $this->hasMany(MedicoAtencion::className(), ['medico_id' => 'id_medico']);
    }

    /**
     * Gets query for [[Turnos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTurnos()
    {
        return $this->hasMany(Turnos::className(), ['medico_id' => 'id_medico']);
    }
}
