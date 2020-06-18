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
 * @property int $telefono
 * @property int $celular
 * @property string|null $sexo
 * @property string $tipo_doc
 * @property int $nro_doc
 * @property string|null $nom_ape_mat
 * @property string|null $nom_ape_pat
 * @property int|null $obra_social_id
 * @property string $num_afil
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
            [['nombre', 'apellido', 'direccion', 'telefono', 'celular', 'tipo_doc', 'nro_doc', 'num_afil', 'fecha_nacimiento', 'responsable_nombre', 'resoponsable_telef'], 'required'],
            [['telefono', 'celular', 'nro_doc', 'obra_social_id', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
            [['sexo', 'tipo_doc'], 'string'],
            [['fecha_nacimiento'], 'safe'],
            [['nombre', 'apellido', 'direccion', 'nom_ape_mat', 'nom_ape_pat'], 'string', 'max' => 250],
            [['num_afil'], 'string', 'max' => 200],
            [['responsable_nombre'], 'string', 'max' => 100],
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
     * @return \yii\db\ActiveQuery|ObraSocialQuery
     */
    public function getObraSocial()
    {
        return $this->hasOne(ObraSocial::className(), ['id_obra_social' => 'obra_social_id']);
    }

    /**
     * Gets query for [[PacientePatologias]].
     *
     * @return \yii\db\ActiveQuery|PacientePatologiaQuery
     */
    public function getPacientePatologias()
    {
        return $this->hasMany(PacientePatologia::className(), ['paciente_id' => 'id_paciente']);
    }

    /**
     * Gets query for [[Turnos]].
     *
     * @return \yii\db\ActiveQuery|TurnosQuery
     */
    public function getTurnos()
    {
        return $this->hasMany(Turnos::className(), ['paciente_id' => 'id_paciente']);
    }

    /**
     * {@inheritdoc}
     * @return PacienteQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PacienteQuery(get_called_class());
    }
}
