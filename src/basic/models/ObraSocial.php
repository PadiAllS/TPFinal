<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "obra_social".
 *
 * @property int $id_obra_social
 * @property string|null $nombre
 * @property string|null $direccion
 * @property int|null $telefono
 * @property int|null $celular
 * @property string|null $contacto
 * @property int|null $reintegro
 * @property int|null $created_by
 * @property int|null $created_at
 * @property int|null $updated_by
 * @property int|null $updated_at
 *
 * @property Paciente[] $pacientes
 */
class Obrasocial extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'obra_social';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['telefono', 'celular', 'reintegro', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
            [['nombre', 'direccion', 'contacto'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            // 'id_obra_social' => 'Id Obra Social',
            'nombre' => 'Nombre',
            'direccion' => 'Direccion',
            'telefono' => 'Telefono',
            'celular' => 'Celular',
            'contacto' => 'Contacto',
            'reintegro' => 'Reintegro',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Pacientes]].
     *
     * @return \yii\db\ActiveQuery|PacienteQuery
     */
    public function getPacientes()
    {
        return $this->hasMany(Paciente::className(), ['obra_social_id' => 'id_obra_social']);
    }

    /**
     * {@inheritdoc}
     * @return ObrasocialQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ObrasocialQuery(get_called_class());
    }
}
