<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "medico_atencion".
 *
 * @property int $id_medicoatencion
 * @property int $medico_id
 * @property int $hatencion_id
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property Medico $medico
 * @property HoraAtencion $hatencion
 */
class Medicoatencion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'medico_atencion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['medico_id', 'hatencion_id'], 'required'],
            [['medico_id', 'hatencion_id', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['medico_id'], 'exist', 'skipOnError' => true, 'targetClass' => Medico::className(), 'targetAttribute' => ['medico_id' => 'id_medico']],
            [['hatencion_id'], 'exist', 'skipOnError' => true, 'targetClass' => Horaatencion::className(), 'targetAttribute' => ['hatencion_id' => 'id_hatencion']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_medicoatencion' => 'Id Medicoatencion',
            'medico_id' => 'Medico ID',
            'hatencion_id' => 'Hatencion ID',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Medico]].
     *
     * @return \yii\db\ActiveQuery|MedicoQuery
     */


    public function getMedico()
    {
        return $this->hasOne(Medico::className(), ['id_medico' => 'medico_id']);
    }

    /**
     * Gets query for [[Hatencion]].
     *
     * @return \yii\db\ActiveQuery|HoraatencionQuery
     */
    public function getHatencion()
    {
        return $this->hasOne(Horaatencion::className(), ['id_hatencion' => 'hatencion_id']);
    }

    /**
     * {@inheritdoc}
     * @return MedicoatencionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MedicoatencionQuery(get_called_class());
    }
}
