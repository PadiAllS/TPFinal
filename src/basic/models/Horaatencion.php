<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hora_atencion".
 *
 * @property int $id_hatencion
 * @property string $dia
 * @property string $desde
 * @property string $hasta
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property MedicoAtencion[] $medicoAtencions
 */
class Horaatencion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hora_atencion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dia', 'desde', 'hasta'], 'required'],
            [['desde', 'hasta'], 'safe'],
            [['created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['dia'], 'string', 'max' => 25],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_hatencion' => 'Id Hatencion',
            'dia' => 'Dia',
            'desde' => 'Desde',
            'hasta' => 'Hasta',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[MedicoAtencions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMedicoAtencions()
    {
        return $this->hasMany(MedicoAtencion::className(), ['hatencion_id' => 'id_hatencion']);
    }
}
