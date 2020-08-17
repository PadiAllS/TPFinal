<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "obra_social".
 *
 * @property int $id_obra_social
 * @property string $nombre
 * @property string $direccion
 * @property string $telefono
 * @property string $celular
 * @property string $contacto
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
            [['nombre', 'direccion', 'telefono', 'celular', 'contacto'], 'required'],
            [['created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
            [['nombre', 'direccion', 'contacto'], 'string', 'max' => 100],
            [['telefono', 'celular'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_obra_social' => 'Id Obra Social',
            'nombre' => 'Nombre',
            'direccion' => 'Direccion',
            'telefono' => 'Telefono',
            'celular' => 'Celular',
            'contacto' => 'Contacto',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Pacientes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPacientes()
    {
        return $this->hasMany(Paciente::className(), ['obra_social_id' => 'id_obra_social']);
    }
}
