<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SOLICITANTE;

/**
 * SOLICITANTESearch represents the model behind the search form about `app\models\SOLICITANTE`.
 */
class SOLICITANTESearch extends SOLICITANTE
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_SOLICITANTE', 'CEDULA', 'COD_TELEFONO', 'NRO_TELEFONO'], 'number'],
            [['NACIONALIDAD', 'PRIMER_NOMBRE', 'SEGUNDO_NOMBRE', 'PRIMER_APELLIDO', 'SEGUNDO_APELLIDO', 'CORREO_ELECTRONICO'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = SOLICITANTE::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'ID_SOLICITANTE' => $this->ID_SOLICITANTE,
            'CEDULA' => $this->CEDULA,
            'COD_TELEFONO' => $this->COD_TELEFONO,
            'NRO_TELEFONO' => $this->NRO_TELEFONO,
        ]);

        $query->andFilterWhere(['like', 'NACIONALIDAD', $this->NACIONALIDAD])
            ->andFilterWhere(['like', 'PRIMER_NOMBRE', $this->PRIMER_NOMBRE])
            ->andFilterWhere(['like', 'SEGUNDO_NOMBRE', $this->SEGUNDO_NOMBRE])
            ->andFilterWhere(['like', 'PRIMER_APELLIDO', $this->PRIMER_APELLIDO])
            ->andFilterWhere(['like', 'SEGUNDO_APELLIDO', $this->SEGUNDO_APELLIDO])
            ->andFilterWhere(['like', 'CORREO_ELECTRONICO', $this->CORREO_ELECTRONICO]);

        return $dataProvider;
    }
}
