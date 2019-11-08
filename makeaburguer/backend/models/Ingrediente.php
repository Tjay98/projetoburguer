<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ingrediente".
 *
 * @property int $id
 * @property string $nome
 * @property string $descricao
 * @property string $preco
 *
 * @property Hamburger[] $hamburgers
 * @property Hamburger[] $hamburgers0
 * @property Hamburger[] $hamburgers1
 * @property Hamburger[] $hamburgers2
 * @property Hamburger[] $hamburgers3
 * @property Hamburger[] $hamburgers4
 * @property Hamburger[] $hamburgers5
 * @property Hamburger[] $hamburgers6
 * @property Hamburger[] $hamburgers7
 * @property Hamburger[] $hamburgers8
 * @property Hamburger[] $hamburgers9
 * @property Hamburger[] $hamburgers10
 * @property Hamburger[] $hamburgers11
 * @property Hamburger[] $hamburgers12
 * @property Hamburger[] $hamburgers13
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
            [['nome', 'preco'], 'required'],
            [['preco'], 'number'],
            [['nome'], 'string', 'max' => 50],
            [['descricao'], 'string', 'max' => 255],
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
            'descricao' => 'Descricao',
            'preco' => 'Preco',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHamburgers()
    {
        return $this->hasMany(Hamburger::className(), ['ingrediente1' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHamburgers0()
    {
        return $this->hasMany(Hamburger::className(), ['ingrediente10' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHamburgers1()
    {
        return $this->hasMany(Hamburger::className(), ['ingrediente_extra1' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHamburgers2()
    {
        return $this->hasMany(Hamburger::className(), ['ingrediente_extra2' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHamburgers3()
    {
        return $this->hasMany(Hamburger::className(), ['ingrediente_extra3' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHamburgers4()
    {
        return $this->hasMany(Hamburger::className(), ['ingrediente_extra4' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHamburgers5()
    {
        return $this->hasMany(Hamburger::className(), ['ingrediente_extra5' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHamburgers6()
    {
        return $this->hasMany(Hamburger::className(), ['ingrediente2' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHamburgers7()
    {
        return $this->hasMany(Hamburger::className(), ['ingrediente3' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHamburgers8()
    {
        return $this->hasMany(Hamburger::className(), ['ingrediente4' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHamburgers9()
    {
        return $this->hasMany(Hamburger::className(), ['ingrediente5' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHamburgers10()
    {
        return $this->hasMany(Hamburger::className(), ['ingrediente6' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHamburgers11()
    {
        return $this->hasMany(Hamburger::className(), ['ingrediente7' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHamburgers12()
    {
        return $this->hasMany(Hamburger::className(), ['ingrediente8' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHamburgers13()
    {
        return $this->hasMany(Hamburger::className(), ['ingrediente9' => 'id']);
    }
}
