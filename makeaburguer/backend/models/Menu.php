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
 *
 * @property Hamburger $hamburger
 * @property Produtos $bebida
 * @property Produtos $complemento
 * @property Produtos $sobremesa
 * @property Produtos $extra
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
            [['id_hamburger', 'id_bebida', 'id_complemento', 'id_sobremesa', 'id_extra'], 'integer'],
            [['preco'], 'number'],
            [['descricao'], 'string', 'max' => 255],
            [['id_hamburger'], 'exist', 'skipOnError' => true, 'targetClass' => Hamburger::className(), 'targetAttribute' => ['id_hamburger' => 'id']],
            [['id_bebida'], 'exist', 'skipOnError' => true, 'targetClass' => Produtos::className(), 'targetAttribute' => ['id_bebida' => 'id']],
            [['id_complemento'], 'exist', 'skipOnError' => true, 'targetClass' => Produtos::className(), 'targetAttribute' => ['id_complemento' => 'id']],
            [['id_sobremesa'], 'exist', 'skipOnError' => true, 'targetClass' => Produtos::className(), 'targetAttribute' => ['id_sobremesa' => 'id']],
            [['id_extra'], 'exist', 'skipOnError' => true, 'targetClass' => Produtos::className(), 'targetAttribute' => ['id_extra' => 'id']],
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHamburger()
    {
        return $this->hasOne(Hamburger::className(), ['id' => 'id_hamburger']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBebida()
    {
        return $this->hasOne(Produtos::className(), ['id' => 'id_bebida']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComplemento()
    {
        return $this->hasOne(Produtos::className(), ['id' => 'id_complemento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSobremesa()
    {
        return $this->hasOne(Produtos::className(), ['id' => 'id_sobremesa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExtra()
    {
        return $this->hasOne(Produtos::className(), ['id' => 'id_extra']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedidos()
    {
        return $this->hasMany(Pedido::className(), ['id_menu' => 'id']);
    }
}
