<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pedido".
 *
 * @property int $id
 * @property int $id_cliente
 * @property int $id_menu
 * @property string $preco
 * @property string $data
 * @property string $compra
 *
 * @property Cliente $cliente
 * @property Menu $menu
 */
class Pedido extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pedido';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_cliente', 'id_menu', 'preco', 'data', 'compra'], 'required'],
            [['id_cliente', 'id_menu'], 'integer'],
            [['preco'], 'number'],
            [['data'], 'string', 'max' => 255],
            [['compra'], 'string', 'max' => 1],
            [['id_cliente'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::className(), 'targetAttribute' => ['id_cliente' => 'id']],
            [['id_menu'], 'exist', 'skipOnError' => true, 'targetClass' => Menu::className(), 'targetAttribute' => ['id_menu' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_cliente' => 'Id Cliente',
            'id_menu' => 'Id Menu',
            'preco' => 'Preco',
            'data' => 'Data',
            'compra' => 'Compra',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCliente()
    {
        return $this->hasOne(Cliente::className(), ['id' => 'id_cliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenu()
    {
        return $this->hasOne(Menu::className(), ['id' => 'id_menu']);
    }
}
