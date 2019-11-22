<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cliente".
 *
 * @property int $id
 * @property string $nome
 * @property int $nif
 * @property string $telemovel
 * @property string $email
 * @property string $password
 * @property string $estado
 * @property int $id_user
 *
 * @property User $user
 * @property Pedido[] $pedidos
 */
class Cliente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cliente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'nif', 'telemovel', 'email', 'password', 'estado', 'id_user'], 'required'],
            [['nif', 'id_user'], 'integer'],
            [['nome', 'email', 'password', 'estado'], 'string', 'max' => 50],
            [['telemovel'], 'string', 'max' => 20],
            [['nif'], 'unique'],
            [['email'], 'unique'],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
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
            'nif' => 'Nif',
            'telemovel' => 'Telemovel',
            'email' => 'Email',
            'password' => 'Password',
            'estado' => 'Estado',
            'id_user' => 'Id User',
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
    public function getPedidos()
    {
        return $this->hasMany(Pedido::className(), ['id_cliente' => 'id']);
    }
}
