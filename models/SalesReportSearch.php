<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Rent;

/**
 * SalesReportSearch represents the model behind the search form about `app\models\Rent`.
 */
class SalesReportSearch extends Rent {
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'automovil_id', 'cliente_id', 'vendedor_id', 'num_dias'], 'integer'],
            [['status', 'fecha_entrega', 'fecha_devolucion', 'lugar_entrega', 'nota'], 'safe'],
            [['total', 'penalizacion'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
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
    public function search($startDate, $endDate) {
        $query = Rent::find()
        ->where(['between', 'fecha_entrega', $startDate, $endDate])
        ->andWhere(['rent.status' => Rent::APROBADO]);

        $query->joinWith(['cliente', 'automovil']);

        //$query->joinWith(['cliente', 'automovil']);

        // add conditions that should always apply here
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => false
        ]);

        //$this->load($params);

        //if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
          //  return $dataProvider;
        //}

        // grid filtering conditions
        $query->andFilterWhere([
            //'id' => $this->id,
            //'automovil_id' => $this->automovil_id,
            //'cliente_id' => $cliente,
            //'vendedor_id' => $this->vendedor_id,
            //'num_dias' => $this->num_dias,
            'total' => $this->total
            //'penalizacion' => $this->penalizacion,
            //'rent.status' => $status
        ]);

        $query->andFilterWhere(['like', 'fecha_entrega', $this->fecha_entrega])
            ->andFilterWhere(['like', 'fecha_devolucion', $this->fecha_devolucion]);

        return $dataProvider;
    }

     /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function searchTopCars($startDate, $endDate) {
        
        $rents = Rent::find()
        ->select(['car.nombre', 'count(`automovil_id`) as num_rents'])
        ->join('INNER JOIN','car', 'car.id = automovil_id')
        ->where(['between', 'fecha_entrega', $startDate, $endDate])
        ->andWhere(['rent.status' => Rent::APROBADO])       
        ->groupBy(['automovil_id'])
        ->asArray()
        ->all();

        return $rents;
    }

    public function searchTopSalers($startDate, $endDate) {
        
        $rents = Rent::find()
        ->select(['person.nombre', 'count(`vendedor_id`) as num_rents'])
        ->join('INNER JOIN','person', 'person.id = vendedor_id')
        ->where(['between', 'fecha_entrega', $startDate, $endDate])
        ->andWhere(['rent.status' => Rent::APROBADO])       
        ->groupBy(['vendedor_id'])
        ->asArray()
        ->all();

        return $rents;
    }
}
