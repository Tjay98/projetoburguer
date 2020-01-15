<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ingrediente".
 *
 * @property int $id
 * @property string $nome
 * @property float $preco
 * @property int $tipo
 */
class Ingrediente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ingrediente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'preco', 'tipo'], 'required'],
            [['preco'], 'number'],
            [['tipo'], 'integer'],
            [['nome'], 'string', 'max' => 50],
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
            'preco' => 'Preco',
            'tipo' => 'Tipo',
        ];
    }
}
