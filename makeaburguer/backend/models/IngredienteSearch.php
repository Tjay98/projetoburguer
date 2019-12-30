<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Ingrediente;

/**
 * IngredienteSearch represents the model behind the search form of `app\models\Ingrediente`.
 */
class IngredienteSearch extends Ingrediente
{
    /**
     * {@inheritdoc}
     */
    public $globalSearch;
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['nome', 'tipo','globalSearch'], 'safe'],
            [['preco'], 'number'],
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
        $query = Ingrediente::find();

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
            'preco' => $this->preco,
        ]);
        */
        $query->orFilterWhere(['like', 'nome', $this->globalSearch])
            ->orFilterWhere(['like', 'tipo', $this->globalSearch]);

        return $dataProvider;
    }
}
