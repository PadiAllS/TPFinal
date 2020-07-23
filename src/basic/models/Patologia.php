<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "patologia".
 *
 * @property int $id_patologia
 * @property string $nombre
 * @property string $detalle
 * @property int|null $created_by
 * @property int|null $created_at
 * @property int|null $updated_by
 * @property int|null $updated_at
 *
 * @property PacientePatologia[] $pacientePatologias
 */
class Patologia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'patologia';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'detalle'], 'required'],
            [['created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
            [['nombre'], 'string', 'max' => 240],
            [['detalle'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_patologia' => 'Id Patologia',
            'nombre' => 'Nombre',
            'detalle' => 'Detalle',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[PacientePatologias]].
     *
     * @return \yii\db\ActiveQuery|PacientePatologiaQuery
     */
    public function getPacientePatologias()
    {
        return $this->hasMany(PacientePatologia::className(), ['patologia_id' => 'id_patologia']);
    }

    /**
     * {@inheritdoc}
     * @return PatologiaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PatologiaQuery(get_called_class());
    }
}
