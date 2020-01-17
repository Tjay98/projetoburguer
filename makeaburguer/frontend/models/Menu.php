<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "menu".
 *
 * @property int $id
 * @property int $id_hamburguer
 * @property int $id_hamburguerC
 * @property int $id_bebida
 * @property int $id_complemento
 * @property int $id_sobremesa
 * @property int $id_extra
 * @property string $preco
 *
 * @property HamburguerC $hamburguerC
 * @property Pedido[] $pedidos
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
            [['id_hamburguer', 'id_hamburguerc', 'id_bebida', 'id_complemento', 'id_sobremesa', 'id_extra'], 'integer'],
            [['preco'], 'number'],
           // [['id_hamburguerC'], 'exist', 'skipOnError' => true, 'targetClass' => HamburguerC::className(), 'targetAttribute' => ['id_hamburguerC' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_hamburguer' => 'Id Hamburguer',
            'id_hamburguerc' => 'Id Hamburguer c',
            'id_bebida' => 'Id Bebida',
            'id_complemento' => 'Id Complemento',
            'id_sobremesa' => 'Id Sobremesa',
            'id_extra' => 'Id Extra',
            'preco' => 'Preco',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHamburguerC()
    {
        return $this->hasOne(HamburguerC::className(), ['id' => 'id_hamburguerC']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedidos()
    {
        return $this->hasMany(Pedido::className(), ['id_menu' => 'id']);
    }
}
