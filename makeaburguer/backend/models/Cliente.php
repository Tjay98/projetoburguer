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
 *
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
            [['nome', 'nif', 'telemovel', 'email', 'password', 'estado'], 'required'],
            [['nif'], 'integer'],
            [['nome', 'email', 'password', 'estado'], 'string', 'max' => 50],
            [['telemovel'], 'string', 'max' => 20],
            [['nif'], 'unique'],
            [['email'], 'unique'],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedidos()
    {
        return $this->hasMany(Pedido::className(), ['id_cliente' => 'id']);
    }
}
