<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "paciente_patologia".
 *
 * @property int $id_paciente_patologia
 * @property int $paciente_id
 * @property int $patologia_id
 * @property int|null $created_by
 * @property int|null $created_at
 * @property int|null $updated_by
 * @property int|null $updated_at
 *
 * @property Paciente $paciente
 * @property Patologia $patologia
 */
class Pacientepatologia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'paciente_patologia';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['paciente_id', 'patologia_id'], 'required'],
            [['paciente_id', 'patologia_id', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
            [['paciente_id'], 'exist', 'skipOnError' => true, 'targetClass' => Paciente::className(), 'targetAttribute' => ['paciente_id' => 'id_paciente']],
            [['patologia_id'], 'exist', 'skipOnError' => true, 'targetClass' => Patologia::className(), 'targetAttribute' => ['patologia_id' => 'id_patologia']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_paciente_patologia' => 'Id Paciente Patologia',
            'paciente_id' => 'Paciente ID',
            'patologia_id' => 'Patologia ID',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_by' => 'Updated By',
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
     * Gets query for [[Patologia]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPatologia()
    {
        return $this->hasOne(Patologia::className(), ['id_patologia' => 'patologia_id']);
    }
}
