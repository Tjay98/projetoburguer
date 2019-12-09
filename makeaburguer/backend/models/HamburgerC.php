<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hamburger_c".
 *
 * @property int $id
 * @property int $pao
 * @property int $molho
 * @property int $carne
 * @property int $vegetais
 * @property int $queijo
 * @property int $complementos
 *
 * @property Ingrediente $pao0
 * @property Ingrediente $molho0
 * @property Ingrediente $carne0
 * @property Ingrediente $vegetais0
 * @property Ingrediente $queijo0
 * @property Ingrediente $complementos0
 */
class HamburgerC extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hamburger_c';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'pao', 'molho', 'carne', 'vegetais', 'queijo', 'complementos'], 'required'],
            [['id', 'pao', 'molho', 'carne', 'vegetais', 'queijo', 'complementos'], 'integer'],
            [['id'], 'unique'],
            [['pao'], 'exist', 'skipOnError' => true, 'targetClass' => Ingrediente::className(), 'targetAttribute' => ['pao' => 'id']],
            [['molho'], 'exist', 'skipOnError' => true, 'targetClass' => Ingrediente::className(), 'targetAttribute' => ['molho' => 'id']],
            [['carne'], 'exist', 'skipOnError' => true, 'targetClass' => Ingrediente::className(), 'targetAttribute' => ['carne' => 'id']],
            [['vegetais'], 'exist', 'skipOnError' => true, 'targetClass' => Ingrediente::className(), 'targetAttribute' => ['vegetais' => 'id']],
            [['queijo'], 'exist', 'skipOnError' => true, 'targetClass' => Ingrediente::className(), 'targetAttribute' => ['queijo' => 'id']],
            [['complementos'], 'exist', 'skipOnError' => true, 'targetClass' => Ingrediente::className(), 'targetAttribute' => ['complementos' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pao' => 'Pao',
            'molho' => 'Molho',
            'carne' => 'Carne',
            'vegetais' => 'Vegetais',
            'queijo' => 'Queijo',
            'complementos' => 'Complementos',
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
    public function getComplementos0()
    {
        return $this->hasOne(Ingrediente::className(), ['id' => 'complementos']);
    }
}
