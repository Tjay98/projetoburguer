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
    public function getUsername()
    {
        return $this->user->username;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPromocao0()
    {
        return $this->hasOne(Promocoes::className(), ['id' => 'promocao']);
    }

    public function setId_user($id_user)
    {
        $this->id_user=$id_user;
    }

    public function getId_user()
    {
        return $this->id_user;
    }

    public function setId_menu($id_menu)
    {
        $this->id_menu=$id_menu;
    }

    public function getId_menu()
    {
        return $this->id_menu;
    }

    public function setPromocao($promocao)
    {
        $this->promocao=$promocao;
    }

    public function getPromocao()
    {
        return $this->promocao;
    }

    public function setPreco($preco)
    {
        $this->preco=$preco;
    }

    public function getPreco()
    {
        return $this->preco;
    }

    public function setData($data)
    {
        $this->data=$data;
    }

    public function getData()
    {
        return $this->data;
    }
}
