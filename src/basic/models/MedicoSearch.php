<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Medico;

/**
 * MedicoSearch represents the model behind the search form of `app\models\Medico`.
 */
class MedicoSearch extends Medico
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_medico', 'telefono', 'celular', 'especialidad_id', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
            [['nombre', 'apellido', 'direccion', 'fecha_nacimiento', 'sexo', 'tipo_doc', 'nro_doc'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Medico::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params, '');

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_medico' => $this->id_medico,
            'telefono' => $this->telefono,
            'celular' => $this->celular,
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'especialidad_id' => $this->especialidad_id,
            'created_by' => $this->created_by,
            'created_at' => $this->created_at,
            'updated_by' => $this->updated_by,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'apellido', $this->apellido])
            ->andFilterWhere(['like', 'direccion', $this->direccion])
            // ->andFilterWhere(['like', 'localidad', $this->localidad])
            // ->andFilterWhere(['like', 'codpos', $this->codpos])
            ->andFilterWhere(['like', 'sexo', $this->sexo])
            ->andFilterWhere(['like', 'tipo_doc', $this->tipo_doc])
            ->andFilterWhere(['like', 'nro_doc', $this->nro_doc])
            // ->andFilterWhere(['like', 'mail', $this->mail])
            ->andFilterWhere(['like', 'matricula', $this->matricula]);

        return $dataProvider;
    }
}
