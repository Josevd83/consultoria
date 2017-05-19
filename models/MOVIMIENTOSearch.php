<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MOVIMIENTO;

/**
 * MOVIMIENTOSearch represents the model behind the search form about `app\models\MOVIMIENTO`.
 */
class MOVIMIENTOSearch extends MOVIMIENTO
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_MOVIMIENTO', 'ID_DOCUMENTO', 'ID_ESTATUS', 'ID_DEPARTAMENTO', 'ID_USUARIO', 'ID_SOLICITANTE', 'ID_TIPO_MOVIMIENTO', 'ID_TIPO_DOCUMENTO', 'ID_PASO', 'NRO_PASO'], 'number'],
            [['DESCRIPCION_PASO', 'OBSERVACIONES', 'FECHA_CREACION', 'FECHA_MODIFICACION'], 'safe'],
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
        $query = MOVIMIENTO::find();

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
            'ID_MOVIMIENTO' => $this->ID_MOVIMIENTO,
            'ID_DOCUMENTO' => $this->ID_DOCUMENTO,
            'ID_ESTATUS' => $this->ID_ESTATUS,
            'ID_DEPARTAMENTO' => $this->ID_DEPARTAMENTO,
            'ID_USUARIO' => $this->ID_USUARIO,
            'ID_SOLICITANTE' => $this->ID_SOLICITANTE,
            'ID_TIPO_MOVIMIENTO' => $this->ID_TIPO_MOVIMIENTO,
            'ID_TIPO_DOCUMENTO' => $this->ID_TIPO_DOCUMENTO,
            'ID_PASO' => $this->ID_PASO,
            'NRO_PASO' => $this->NRO_PASO,
        ]);

        $query->andFilterWhere(['like', 'DESCRIPCION_PASO', $this->DESCRIPCION_PASO])
            ->andFilterWhere(['like', 'OBSERVACIONES', $this->OBSERVACIONES])
            ->andFilterWhere(['like', 'FECHA_CREACION', $this->FECHA_CREACION])
            ->andFilterWhere(['like', 'FECHA_MODIFICACION', $this->FECHA_MODIFICACION]);

        return $dataProvider;
    }
}
