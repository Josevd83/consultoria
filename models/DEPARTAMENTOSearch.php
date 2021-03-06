<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DEPARTAMENTO;

/**
 * DEPARTAMENTOSearch represents the model behind the search form about `app\models\DEPARTAMENTO`.
 */
class DEPARTAMENTOSearch extends DEPARTAMENTO
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_DEPARTAMENTO'], 'number'],
            [['DESCRIPCION', 'GERENCIA'], 'safe'],
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
        $query = DEPARTAMENTO::find();

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
            'ID_DEPARTAMENTO' => $this->ID_DEPARTAMENTO,
        ]);

        $query->andFilterWhere(['like', 'DESCRIPCION', $this->DESCRIPCION])
            ->andFilterWhere(['like', 'GERENCIA', $this->GERENCIA]);

        return $dataProvider;
    }
}
