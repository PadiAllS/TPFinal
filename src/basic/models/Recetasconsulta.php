<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "recetas_consulta".
 *
 * @property int $consulta_id
 * @property int|null $vademecum_id
 * @property int|null $created_by
 * @property int|null $created_at
 * @property int|null $updated_by
 * @property int|null $updated_at
 *
 * @property Consulta $consulta
 * @property Vademecum $vademecum
 */
class Recetasconsulta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'recetas_consulta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['consulta_id'], 'required'],
            [['consulta_id', 'vademecum_id', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
            [['consulta_id'], 'unique'],
            [['consulta_id'], 'exist', 'skipOnError' => true, 'targetClass' => Consulta::className(), 'targetAttribute' => ['consulta_id' => 'id_consulta']],
            [['vademecum_id'], 'exist', 'skipOnError' => true, 'targetClass' => Vademecum::className(), 'targetAttribute' => ['vademecum_id' => 'id_vademecum']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'consulta_id' => 'Consulta ID',
            'vademecum_id' => 'Vademecum ID',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Consulta]].
     *
     * @return \yii\db\ActiveQuery|ConsultaQuery
     */
    public function getConsulta()
    {
        return $this->hasOne(Consulta::className(), ['id_consulta' => 'consulta_id']);
    }

    /**
     * Gets query for [[Vademecum]].
     *
     * @return \yii\db\ActiveQuery|VademecumQuery
     */
    public function getVademecum()
    {
        return $this->hasOne(Vademecum::className(), ['id_vademecum' => 'vademecum_id']);
    }

    /**
     * {@inheritdoc}
     * @return RecetasconsultaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RecetasconsultaQuery(get_called_class());
    }
}
