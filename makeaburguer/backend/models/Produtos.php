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
 *
 * @property Categoria $categoria0
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
            [['id', 'nome', 'imagem', 'categoria', 'preco'], 'required'],
            [['id', 'categoria'], 'integer'],
            [['preco'], 'number'],
            [['nome'], 'string', 'max' => 50],
            [['imagem'], 'string', 'max' => 150],
            [['id'], 'unique'],
            [['categoria'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::className(), 'targetAttribute' => ['categoria' => 'id']],
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoria0()
    {
        return $this->hasOne(Categoria::className(), ['id' => 'categoria']);
    }
}
