<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vademecum".
 *
 * @property int $id_vademecum
 * @property string $medicamento
 * @property int|null $created_by
 * @property int|null $created_at
 * @property int|null $updated_by
 * @property int|null $updated_at
 *
 * @property RecetasConsulta[] $recetasConsultas
 */
class Vademecum extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vademecum';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['medicamento'], 'required'],
            [['created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
            [['medicamento'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_vademecum' => 'Id Vademecum',
            'medicamento' => 'Medicamento',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[RecetasConsultas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRecetasConsultas()
    {
        return $this->hasMany(RecetasConsulta::className(), ['vademecum_id' => 'id_vademecum']);
    }
}
