<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pedido".
 *
 * @property int $id
 * @property int $id_user
 * @property int $id_menu
 * @property int $promocao
 * @property string $preco
 * @property string $data
 *
 * @property Menu $menu
 * @property User $user
 * @property Promocoes $promocao0
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
            [['id_user', 'id_menu', 'preco'], 'required'],
            [['id_user', 'id_menu', 'promocao'], 'integer'],
            [['preco'], 'number'],
            [['data'], 'safe'],
            [['id_menu'], 'exist', 'skipOnError' => true, 'targetClass' => Menu::className(), 'targetAttribute' => ['id_menu' => 'id']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
            [['promocao'], 'exist', 'skipOnError' => true, 'targetClass' => Promocoes::className(), 'targetAttribute' => ['promocao' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'id_menu' => 'Id Menu',
            'promocao' => 'Promocao',
            'preco' => 'Preco',
            'data' => 'Data',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenu()
    {
        return $this->hasOne(Menu::className(), ['id' => 'id_menu']);
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
    public function getPromocao0()
    {
        return $this->hasOne(Promocoes::className(), ['id' => 'promocao']);
    }
}
