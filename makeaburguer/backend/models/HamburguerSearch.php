<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Hamburguer;

/**
 * HamburgerSearch represents the model behind the search form of `app\models\Hamburger`.
 */
class HamburguerSearch extends Hamburguer
{
    /**
     * {@inheritdoc}
     */
    public $globalSearch;

    public function rules()
    {
        return [
            [['id', 'pao', 'molho', 'carne', 'vegetais', 'queijo', 'complemento'], 'integer'],
            [['nome', 'imagem', 'descricao','globalSearch'], 'safe'],
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
        $query = Hamburguer::find();

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
       /* 
        $query->andFilterWhere([
            'id' => $this->id,
            'pao' => $this->pao,
            'molho' => $this->molho,
            'carne' => $this->carne,
            'vegetais' => $this->vegetais,
            'queijo' => $this->queijo,
            'complemento' => $this->complemento,
        ]);
        */

        $query->orFilterWhere(['like', 'nome', $this->globalSearch])
            ->orFilterWhere(['like', 'imagem', $this->globalSearch])
            ->orFilterWhere(['like', 'descricao', $this->globalSearch]);

        return $dataProvider;
    }
}
