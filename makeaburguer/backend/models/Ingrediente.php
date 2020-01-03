<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ingrediente".
 *
 * @property int $id
 * @property string $nome
 * @property string $preco
 * @property int $tipo
 *
 * @property Hamburger[] $hamburguers
 * @property Hamburger[] $hamburgers0
 * @property Hamburger[] $hamburgers1
 * @property Hamburger[] $hamburgers2
 * @property Hamburger[] $hamburgers3
 * @property Hamburger[] $hamburgers4
 * @property HamburgerC[] $hamburgerCs
 * @property HamburgerC[] $hamburgerCs0
 * @property HamburgerC[] $hamburgerCs1
 * @property HamburgerC[] $hamburgerCs2
 * @property HamburgerC[] $hamburgerCs3
 * @property HamburgerC[] $hamburgerCs4
 * @property Categoria $tipo0
 * @property Categoria $tipo1
 */
class Ingrediente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ingrediente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'nome', 'preco', 'tipo'], 'required'],
            [['id', 'tipo'], 'integer'],
            [['preco'], 'number'],
            [['nome'], 'string', 'max' => 50],
            [['id'], 'unique'],
            [['tipo'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::className(), 'targetAttribute' => ['tipo' => 'id']],
            [['tipo'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::className(), 'targetAttribute' => ['tipo' => 'id']],
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
            'preco' => 'Preço',
            'tipo' => 'Tipo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHamburguers()
    {
        return $this->hasMany(Hamburguer::className(), ['pao' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHamburguers0()
    {
        return $this->hasMany(Hamburguer::className(), ['molho' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHamburguers1()
    {
        return $this->hasMany(Hamburguer::className(), ['carne' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHamburguers2()
    {
        return $this->hasMany(Hamburguer::className(), ['vegetais' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHamburguers3()
    {
        return $this->hasMany(Hamburguer::className(), ['queijo' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHamburguers4()
    {
        return $this->hasMany(Hamburguer::className(), ['complemento' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHamburguerCs()
    {
        return $this->hasMany(HamburguerC::className(), ['pao' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHamburguerCs0()
    {
        return $this->hasMany(HamburguerC::className(), ['molho' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHamburguerCs1()
    {
        return $this->hasMany(HamburguerC::className(), ['carne' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHamburguerCs2()
    {
        return $this->hasMany(HamburguerC::className(), ['vegetais' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHamburguerCs3()
    {
        return $this->hasMany(HamburguerC::className(), ['queijo' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHamburguerCs4()
    {
        return $this->hasMany(HamburguerC::className(), ['complementos' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipo0()
    {
        return $this->hasOne(Categoria::className(), ['id' => 'tipo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipo1()
    {
        return $this->hasOne(Categoria::className(), ['id' => 'tipo']);
    }
}
