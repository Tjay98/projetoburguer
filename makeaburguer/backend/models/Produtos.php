<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "produtos".
 *
 * @property int $id
 * @property string $nome
 * @property string $tipo
 * @property string $preco
 *
 * @property Menu[] $menus
 * @property Menu[] $menus0
 * @property Menu[] $menus1
 * @property Menu[] $menus2
 */
class Produtos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'produtos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'tipo', 'preco'], 'required'],
            [['preco'], 'number'],
            [['nome', 'tipo'], 'string', 'max' => 50],
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
            'tipo' => 'Tipo',
            'preco' => 'Preco',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenus()
    {
        return $this->hasMany(Menu::className(), ['id_bebida' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenus0()
    {
        return $this->hasMany(Menu::className(), ['id_complemento' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenus1()
    {
        return $this->hasMany(Menu::className(), ['id_sobremesa' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenus2()
    {
        return $this->hasMany(Menu::className(), ['id_extra' => 'id']);
    }
}
