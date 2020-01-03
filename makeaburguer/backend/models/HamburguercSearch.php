<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Hamburguerc;

/**
 * HamburgercSearch represents the model behind the search form of `app\models\Hamburgerc`.
 */
class HamburguercSearch extends Hamburguerc
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'pao', 'molho', 'carne', 'vegetais', 'queijo', 'complementos'], 'integer'],
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
        $query = Hamburguerc::find();

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
            'pao' => $this->pao,
            'molho' => $this->molho,
            'carne' => $this->carne,
            'vegetais' => $this->vegetais,
            'queijo' => $this->queijo,
            'complementos' => $this->complementos,
        ]);

        return $dataProvider;
    }
}
