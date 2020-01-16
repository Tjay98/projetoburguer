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

    public function setNome($nome)
    {
        $this->nome=$nome;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setValor($valor)
    {
        $this->valor=$valor;
    }

    public function getValor()
    {
        return $this->valor;
    }

    public function setData_inicio($data_inicio)
    {
        $this->data_inicio=$data_inicio;
    }

    public function getData_inicio()
    {
        return $this->data_inicio;
    }

    public function setData_fim($data_fim)
    {
        $this->data_fim=$data_fim;
    }

    public function getData_fim()
    {
        return $this->data_fim;
    }
}
