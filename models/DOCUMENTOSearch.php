<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DOCUMENTO;

/**
 * DOCUMENTOSearch represents the model behind the search form about `app\models\DOCUMENTO`.
 */
class DOCUMENTOSearch extends DOCUMENTO
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_DOCUMENTO', 'ID_SOLICITANTE', 'ID_TIPO_DOCUMENTO', 'ID_TIPO_SOLICITUD', 'ID_ORGANISMO', 'ID_BANCO', 'NUM_DOCUMENTO', 'NUM_OFICIO', 'ID_ESTATUS', 'ID_USUARIO', 'ID_ABOGADO'], 'number'],
            [['FECHA_CREACION', 'OBSERVACIONES', 'FECHA_MODIFICACION'], 'safe'],
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
        $query = DOCUMENTO::find();

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
            'ID_DOCUMENTO' => $this->ID_DOCUMENTO,
            'ID_SOLICITANTE' => $this->ID_SOLICITANTE,
            'ID_TIPO_DOCUMENTO' => $this->ID_TIPO_DOCUMENTO,
            'ID_TIPO_SOLICITUD' => $this->ID_TIPO_SOLICITUD,
            'ID_ORGANISMO' => $this->ID_ORGANISMO,
            'ID_BANCO' => $this->ID_BANCO,
            'NUM_DOCUMENTO' => $this->NUM_DOCUMENTO,
            'NUM_OFICIO' => $this->NUM_OFICIO,
            'ID_ESTATUS' => $this->ID_ESTATUS,
            'ID_USUARIO' => $this->ID_USUARIO,
            'ID_ABOGADO' => $this->ID_ABOGADO,
        ]);

        $query->andFilterWhere(['like', 'FECHA_CREACION', $this->FECHA_CREACION])
            ->andFilterWhere(['like', 'OBSERVACIONES', $this->OBSERVACIONES])
            ->andFilterWhere(['like', 'FECHA_MODIFICACION', $this->FECHA_MODIFICACION]);

        return $dataProvider;
    }
}
