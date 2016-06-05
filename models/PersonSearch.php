<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Person;

/**
 * PersonSearch represents the model behind the search form about `app\models\Person`.
 */
class PersonSearch extends Person {
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'celular'], 'integer'],
            [['nombre', 'apellido', 'password', 'email', 'tipo', 'num_licencia', 'num_cuenta', 'banco', 'cuenta', 'cod_seguridad', 'vencimiento', 'licencia'], 'safe'],
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
    public function search($params, $tipo = null) {
        $query = Person::find();

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
            'celular' => $this->celular,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'apellido', $this->apellido])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'tipo', $tipo]) //Filtro por tipo de persona
            ->andFilterWhere(['like', 'num_licencia', $this->num_licencia])
            ->andFilterWhere(['like', 'num_cuenta', $this->num_cuenta])
            ->andFilterWhere(['like', 'banco', $this->banco])
            ->andFilterWhere(['like', 'cuenta', $this->cuenta])
            ->andFilterWhere(['like', 'cod_seguridad', $this->cod_seguridad])
            ->andFilterWhere(['like', 'vencimiento', $this->vencimiento])
            ->andFilterWhere(['like', 'licencia', $this->licencia]);

        return $dataProvider;
    }


}
