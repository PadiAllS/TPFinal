<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "paciente".
 *
 * @property int $id_paciente
 * @property string $nombre
 * @property string $apellido
 * @property string $direccion
 * @property string $telefono
 * @property string $celular
 * @property string|null $sexo
 * @property string $tipo_doc
 * @property string $nro_doc
 * @property string $nom_ape_mat
 * @property string $nom_ape_pat
 * @property int $obra_social_id
 * @property string|null $num_afil
 * @property string $fecha_nacimiento
 * @property string $responsable_nombre
 * @property string $resoponsable_telef
 * @property int|null $created_by
 * @property int|null $created_at
 * @property int|null $updated_by
 * @property int|null $updated_at
 *
 * @property ObraSocial $obraSocial
 * @property PacientePatologia[] $pacientePatologias
 * @property Turnos[] $turnos
 */
class Paciente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'paciente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'apellido', 'direccion', 'telefono', 'celular', 'tipo_doc', 'nro_doc', 'nom_ape_mat', 'nom_ape_pat', 'obra_social_id', 'fecha_nacimiento', 'responsable_nombre', 'resoponsable_telef'], 'required'],
            [['obra_social_id', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
            [['fecha_nacimiento'], 'safe'],
            [['nombre', 'apellido', 'direccion', 'nom_ape_mat', 'nom_ape_pat', 'responsable_nombre'], 'string', 'max' => 100],
            [['telefono', 'celular', 'nro_doc'], 'string', 'max' => 30],
            [['sexo', 'tipo_doc'], 'string', 'max' => 20],
            [['num_afil'], 'string', 'max' => 200],
            [['resoponsable_telef'], 'string', 'max' => 50],
            [['obra_social_id'], 'exist', 'skipOnError' => true, 'targetClass' => ObraSocial::className(), 'targetAttribute' => ['obra_social_id' => 'id_obra_social']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_paciente' => 'Id Paciente',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'direccion' => 'Direccion',
            'telefono' => 'Telefono',
            'celular' => 'Celular',
            'sexo' => 'Sexo',
            'tipo_doc' => 'Tipo Doc',
            'nro_doc' => 'Nro Doc',
            'nom_ape_mat' => 'Nom Ape Mat',
            'nom_ape_pat' => 'Nom Ape Pat',
            'obra_social_id' => 'Obra Social ID',
            'num_afil' => 'Num Afil',
            'fecha_nacimiento' => 'Fecha Nacimiento',
            'responsable_nombre' => 'Responsable Nombre',
            'resoponsable_telef' => 'Resoponsable Telef',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[ObraSocial]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getObraSocial()
    {
        return $this->hasOne(ObraSocial::className(), ['id_obra_social' => 'obra_social_id']);
    }

    /**
     * Gets query for [[PacientePatologias]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPacientePatologias()
    {
        return $this->hasMany(PacientePatologia::className(), ['paciente_id' => 'id_paciente']);
    }

    /**
     * Gets query for [[Turnos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTurnos()
    {
        return $this->hasMany(Turnos::className(), ['paciente_id' => 'id_paciente']);
    }
}
