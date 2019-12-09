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
 * @property Hamburger[] $hamburgers
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
            'preco' => 'Preco',
            'tipo' => 'Tipo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHamburgers()
    {
        return $this->hasMany(Hamburger::className(), ['pao' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHamburgers0()
    {
        return $this->hasMany(Hamburger::className(), ['molho' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHamburgers1()
    {
        return $this->hasMany(Hamburger::className(), ['carne' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHamburgers2()
    {
        return $this->hasMany(Hamburger::className(), ['vegetais' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHamburgers3()
    {
        return $this->hasMany(Hamburger::className(), ['queijo' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHamburgers4()
    {
        return $this->hasMany(Hamburger::className(), ['complemento' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHamburgerCs()
    {
        return $this->hasMany(HamburgerC::className(), ['pao' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHamburgerCs0()
    {
        return $this->hasMany(HamburgerC::className(), ['molho' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHamburgerCs1()
    {
        return $this->hasMany(HamburgerC::className(), ['carne' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHamburgerCs2()
    {
        return $this->hasMany(HamburgerC::className(), ['vegetais' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHamburgerCs3()
    {
        return $this->hasMany(HamburgerC::className(), ['queijo' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHamburgerCs4()
    {
        return $this->hasMany(HamburgerC::className(), ['complementos' => 'id']);
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
