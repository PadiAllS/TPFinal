<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "turnos".
 *
 * @property int $id_turnos
 * @property int $nro_orden
 * @property string|null $fecha_registro
 * @property string|null $fecha_consulta
 * @property int $paciente_id
 * @property int $medico_id
 * @property int $consulta_id
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property Paciente $paciente
 * @property Medico $medico
 * @property Consulta $consulta
 */
class Turnos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'turnos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nro_orden', 'paciente_id', 'medico_id', 'consulta_id'], 'required'],
            [['nro_orden', 'paciente_id', 'medico_id', 'consulta_id', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['fecha_registro', 'fecha_consulta'], 'safe'],
            [['paciente_id'], 'exist', 'skipOnError' => true, 'targetClass' => Paciente::className(), 'targetAttribute' => ['paciente_id' => 'id_paciente']],
            [['medico_id'], 'exist', 'skipOnError' => true, 'targetClass' => Medico::className(), 'targetAttribute' => ['medico_id' => 'id_medico']],
            [['consulta_id'], 'exist', 'skipOnError' => true, 'targetClass' => Consulta::className(), 'targetAttribute' => ['consulta_id' => 'id_consulta']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_turnos' => 'Id Turnos',
            'nro_orden' => 'Nro Orden',
            'fecha_registro' => 'Fecha Registro',
            'fecha_consulta' => 'Fecha Consulta',
            'paciente_id' => 'Paciente ID',
            'medico_id' => 'Medico ID',
            'consulta_id' => 'Consulta ID',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Paciente]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPaciente()
    {
        return $this->hasOne(Paciente::className(), ['id_paciente' => 'paciente_id']);
    }

    /**
     * Gets query for [[Medico]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMedico()
    {
        return $this->hasOne(Medico::className(), ['id_medico' => 'medico_id']);
    }

    /**
     * Gets query for [[Consulta]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getConsulta()
    {
        return $this->hasOne(Consulta::className(), ['id_consulta' => 'consulta_id']);
    }
}
