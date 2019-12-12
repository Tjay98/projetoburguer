<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hamburger".
 *
 * @property int $id
 * @property string $nome
 * @property string $imagem
 * @property string $descricao
 * @property int $pao
 * @property int $molho
 * @property int $carne
 * @property int $vegetais
 * @property int $queijo
 * @property int $complemento
 * @property int $preco
 *
 * @property Ingrediente $pao0
 * @property Ingrediente $molho0
 * @property Ingrediente $carne0
 * @property Ingrediente $vegetais0
 * @property Ingrediente $queijo0
 * @property Ingrediente $complemento0
 */
class Hamburger extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hamburger';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'descricao', 'pao', 'molho', 'carne', 'vegetais', 'queijo', 'complemento', 'preco'], 'required'],
            [['descricao'], 'string'],
            [['pao', 'molho', 'carne', 'vegetais', 'queijo', 'complemento', 'preco'], 'integer'],
            [['nome'], 'string', 'max' => 30],
            [['imagem'], 'file','extensions'=>'jpg'],
            [['pao'], 'exist', 'skipOnError' => true, 'targetClass' => Ingrediente::className(), 'targetAttribute' => ['pao' => 'id']],
            [['molho'], 'exist', 'skipOnError' => true, 'targetClass' => Ingrediente::className(), 'targetAttribute' => ['molho' => 'id']],
            [['carne'], 'exist', 'skipOnError' => true, 'targetClass' => Ingrediente::className(), 'targetAttribute' => ['carne' => 'id']],
            [['vegetais'], 'exist', 'skipOnError' => true, 'targetClass' => Ingrediente::className(), 'targetAttribute' => ['vegetais' => 'id']],
            [['queijo'], 'exist', 'skipOnError' => true, 'targetClass' => Ingrediente::className(), 'targetAttribute' => ['queijo' => 'id']],
            [['complemento'], 'exist', 'skipOnError' => true, 'targetClass' => Ingrediente::className(), 'targetAttribute' => ['complemento' => 'id']],
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
            'imagem' => 'Imagem',
            'descricao' => 'Descricao',
            'pao' => 'Pao',
            'molho' => 'Molho',
            'carne' => 'Carne',
            'vegetais' => 'Vegetais',
            'queijo' => 'Queijo',
            'complemento' => 'Complemento',
            'preco' => 'Preco',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPao0()
    {
        return $this->hasOne(Ingrediente::className(), ['id' => 'pao']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMolho0()
    {
        return $this->hasOne(Ingrediente::className(), ['id' => 'molho']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarne0()
    {
        return $this->hasOne(Ingrediente::className(), ['id' => 'carne']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVegetais0()
    {
        return $this->hasOne(Ingrediente::className(), ['id' => 'vegetais']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQueijo0()
    {
        return $this->hasOne(Ingrediente::className(), ['id' => 'queijo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComplemento0()
    {
        return $this->hasOne(Ingrediente::className(), ['id' => 'complemento']);
    }
}
