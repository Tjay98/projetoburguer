<?php

namespace app\models;

use Yii;
use yii\db\Expression;

/**
 * This is the model class for table "pedido".
 *
 * @property int $id
 * @property int $id_user
 * @property int $id_menu
 * @property string $preco
 * @property string $data
 * @property string $compra
 *
 * @property User $user
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
            [['id_user', 'id_menu', 'preco', 'data', 'compra'], 'required'],
            [['id_user', 'id_menu'], 'integer'],
            [['preco'], 'number'],
            [['data'], 'string', 'max' => 255],
            [['compra'], 'string', 'max' => 1],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
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
            'id_user' => 'User',
            'id_menu' => 'Menu',
            'preco' => 'Preço',
            'data' => 'Data',
            'compra' => 'Compra',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenu()
    {
        return $this->hasOne(Menu::className(), ['id' => 'id_menu']);
    }
}
