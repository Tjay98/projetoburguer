<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "categoria".
 *
 * @property int $id
 * @property string $nome
 *
 * @property Ingrediente[] $ingredientes
 * @property Ingrediente[] $ingredientes0
 * @property Produtos[] $produtos
 */
class Categoria extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categoria';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome'], 'required'],
            [['nome'], 'string', 'max' => 32],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIngredientes()
    {
        return $this->hasMany(Ingrediente::className(), ['tipo' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIngredientes0()
    {
        return $this->hasMany(Ingrediente::className(), ['tipo' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProdutos()
    {
        return $this->hasMany(Produtos::className(), ['categoria' => 'id']);
    }

    public function setNome($nome)
    {
        $this->nome=$nome;
    }

    public function getNome()
    {
        return $this->nome;
    }
    
}
