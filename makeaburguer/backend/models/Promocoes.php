<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "promocoes".
 *
 * @property int $id
 * @property string $nome
 * @property string $valor
 * @property string $data_inicio
 * @property string $data_fim
 *
 * @property Pedido[] $pedidos
 */
class Promocoes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'promocoes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'valor', 'data_inicio', 'data_fim'], 'required'],
            [['valor'], 'number'],
            [['nome', 'data_inicio', 'data_fim'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'valor' => 'Valor',
            'data_inicio' => 'Data Inicio',
            'data_fim' => 'Data Fim',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedidos()
    {
        return $this->hasMany(Pedido::className(), ['promocao' => 'id']);
    }
}
