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
            [['pao', 'carne'], 'required'],
            [['pao', 'molho', 'carne', 'vegetais', 'queijo', 'complementos'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pao' => 'Pão',
            'molho' => 'Molho',
            'carne' => 'Carne',
            'vegetais' => 'Vegetais',
            'queijo' => 'Queijo',
            'complementos' => 'Complementos',
        ];
    }


}
