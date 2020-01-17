<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hamburguer_c".
 *
 * @property int $id
 * @property int $id_user
 * @property int|null $pao
 * @property int|null $molho
 * @property int|null $carne
 * @property int|null $vegetais
 * @property int|null $queijo
 * @property int|null $complementos
 * @property float $preco
 * @property string $data_criacao
 *
 * @property User $user
 * @property Menu[] $menus
 */
class HamburguerC extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hamburguer_c';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'preco'], 'required'],
            [['id_user', 'pao', 'molho', 'carne', 'vegetais', 'queijo', 'complementos'], 'integer'],
            [['preco'], 'number'],
            [['data_criacao'], 'safe'],
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
            'id_user' => 'Id User',
            'pao' => 'Pao',
            'molho' => 'Molho',
            'carne' => 'Carne',
            'vegetais' => 'Vegetais',
            'queijo' => 'Queijo',
            'complementos' => 'Complementos',
            'preco' => 'Preco',
            'data_criacao' => 'Data Criacao',
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
    public function getMenus()
    {
        return $this->hasMany(Menu::className(), ['id_hamburguerC' => 'id']);
    }
}
