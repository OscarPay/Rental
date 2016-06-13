<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Rent;

/**
 * RentSearch represents the model behind the search form about `app\models\Rent`.
 */
class RentSearch extends Rent
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'automovil_id', 'cliente_id', 'vendedor_id', 'num_dias'], 'integer'],
            [['status', 'fecha_entrega', 'fecha_devolucion', 'lugar_entrega', 'nota'], 'safe'],
            [['total', 'penalizacion'], 'number'],
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
        $query = Rent::find();

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
            'id' => $this->id,
            'automovil_id' => $this->automovil_id,
            'cliente_id' => $this->cliente_id,
            'vendedor_id' => $this->vendedor_id,
            'num_dias' => $this->num_dias,
            'total' => $this->total,
            'penalizacion' => $this->penalizacion,
        ]);

        $query->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'fecha_entrega', $this->fecha_entrega])
            ->andFilterWhere(['like', 'fecha_devolucion', $this->fecha_devolucion])
            ->andFilterWhere(['like', 'lugar_entrega', $this->lugar_entrega])
            ->andFilterWhere(['like', 'nota', $this->nota]);

        return $dataProvider;
    }
}
