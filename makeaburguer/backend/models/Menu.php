<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "menu".
 *
 * @property int $id
 * @property int $id_hamburger
 * @property int $id_bebida
 * @property int $id_complemento
 * @property int $id_sobremesa
 * @property int $id_extra
 * @property string $preco
 * @property string $descricao
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'id_hamburger', 'id_bebida', 'id_complemento', 'id_sobremesa', 'id_extra'], 'integer'],
            [['preco'], 'number'],
            [['descricao'], 'string', 'max' => 255],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_hamburger' => 'Id Hamburger',
            'id_bebida' => 'Id Bebida',
            'id_complemento' => 'Id Complemento',
            'id_sobremesa' => 'Id Sobremesa',
            'id_extra' => 'Id Extra',
            'preco' => 'Preco',
            'descricao' => 'Descricao',
        ];
    }
}
