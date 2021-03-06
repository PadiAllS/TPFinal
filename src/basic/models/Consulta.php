<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "consulta".
 *
 * @property int $id_consulta
 * @property string $motivo
 * @property string $diagnostico
 * @property string $fecha_consulta
 * @property int|null $status
 * @property int $turno_id
 * @property string|null $tratamiento
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property RecetasConsulta $recetasConsulta
 * @property Turnos[] $turnos
 */
class Consulta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'consulta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['motivo', 'diagnostico', 'fecha_consulta', 'turno_id'], 'required'],
            [['fecha_consulta'], 'safe'],
            [['status', 'turno_id', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['tratamiento'], 'string'],
            [['motivo'], 'string', 'max' => 250],
            [['diagnostico'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_consulta' => 'Id Consulta',
            'motivo' => 'Motivo',
            'diagnostico' => 'Diagnostico',
            'fecha_consulta' => 'Fecha Consulta',
            'status' => 'Status',
            'turno_id' => 'Turno ID',
            'tratamiento' => 'Tratamiento',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[RecetasConsulta]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRecetasConsulta()
    {
        return $this->hasOne(RecetasConsulta::className(), ['consulta_id' => 'id_consulta']);
    }

    /**
     * Gets query for [[Turnos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTurnos()
    {
        return $this->hasMany(Turnos::className(), ['consulta_id' => 'id_consulta']);
    }
}
