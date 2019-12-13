<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "produtos".
 *
 * @property int $id
 * @property string $nome
 * @property string $imagem
 * @property int $categoria
 * @property string $preco
 */
class Produtos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'produtos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'imagem', 'categoria', 'preco'], 'required'],
            [['categoria'], 'integer'],
            [['preco'], 'number'],
            [['nome'], 'string', 'max' => 50],
            [['imagem'], 'string', 'max' => 150],
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
            'imagem' => 'Imagem',
            'categoria' => 'Categoria',
            'preco' => 'Preco',
        ];
    }
}
