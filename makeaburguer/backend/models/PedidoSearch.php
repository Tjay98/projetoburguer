<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pedido;

/**
 * PedidoSearch represents the model behind the search form of `app\models\Pedido`.
 */
class PedidoSearch extends Pedido
{
    /**
     * {@inheritdoc}
     */
    public $username;
    public $globalSearch;

    public function rules()
    {
        return [
            [['id', 'id_user', 'id_menu'], 'integer'],
            [['preco'], 'number'],
            [['data','username','globalSearch'], 'safe'],
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
        $query = Pedido::find();

        $query->joinWith(['user']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes=[
            'asc'=>['username'=>SORT_ASC],
            'desc'=>['username'=>SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        /*$query->andFilterWhere([
            'id' => $this->id,
            'id_user' => $this->id_user,
            'id_menu' => $this->id_menu,
            'preco' => $this->preco,
        ]);
        */

        $query->orFilterWhere(['like', 'data', $this->globalSearch])
            ->orFilterWhere(['like','username',$this->globalSearch]);

            //->andFilterWhere(['like', 'compra', $this->compra]);

        return $dataProvider;
    }
}
