<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Hamburger;

/**
 * HamburgerSearch represents the model behind the search form of `app\models\Hamburger`.
 */
class HamburgerSearch extends Hamburger
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'ingrediente1', 'ingrediente2', 'ingrediente3', 'ingrediente4', 'ingrediente5', 'ingrediente6', 'ingrediente7', 'ingrediente8', 'ingrediente9', 'ingrediente10', 'ingrediente_extra1', 'ingrediente_extra2', 'ingrediente_extra3', 'ingrediente_extra4', 'ingrediente_extra5'], 'integer'],
            [['nome', 'descricao'], 'safe'],
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
        $query = Hamburger::find();

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
            'preco' => $this->preco,
            'ingrediente1' => $this->ingrediente1,
            'ingrediente2' => $this->ingrediente2,
            'ingrediente3' => $this->ingrediente3,
            'ingrediente4' => $this->ingrediente4,
            'ingrediente5' => $this->ingrediente5,
            'ingrediente6' => $this->ingrediente6,
            'ingrediente7' => $this->ingrediente7,
            'ingrediente8' => $this->ingrediente8,
            'ingrediente9' => $this->ingrediente9,
            'ingrediente10' => $this->ingrediente10,
            'ingrediente_extra1' => $this->ingrediente_extra1,
            'ingrediente_extra2' => $this->ingrediente_extra2,
            'ingrediente_extra3' => $this->ingrediente_extra3,
            'ingrediente_extra4' => $this->ingrediente_extra4,
            'ingrediente_extra5' => $this->ingrediente_extra5,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'descricao', $this->descricao]);

        return $dataProvider;
    }
}
