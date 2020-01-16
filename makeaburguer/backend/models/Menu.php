<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "menu".
 *
 * @property int $id
 * @property int $id_hamburguer
 * @property int $id_bebida
 * @property int $id_complemento
 * @property int $id_sobremesa
 * @property int $id_extra
 * @property string $preco
 * @property string $descricao
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'id_hamburguer', 'id_bebida', 'id_complemento', 'id_sobremesa', 'id_extra'], 'integer'],
            [['preco'], 'number'],
            [['descricao'], 'string', 'max' => 255],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_hamburguer' => 'Hamburguer',
            'id_bebida' => 'Bebida',
            'id_complemento' => 'Complemento',
            'id_sobremesa' => 'Sobremesa',
            'id_extra' => 'Extra',
            'preco' => 'Preço',
            'descricao' => 'Descrição',
        ];
    }

    public function setId_hamburguer($id_hamburguer)
    {
        $this->id_hamburguer=$id_hamburguer;
    }

    public function setId_bebida($id_bebida)
    {
        $this->id_bebida=$id_bebida;
    }
    
    public function setId_complemento($id_complemento)
    {
        $this->id_complemento=$id_complemento;
    }

    public function setId_sobremesa($id_sobremesa)
    {
        $this->id_sobremesa=$id_sobremesa;
    }

    public function setId_extra($id_extra)
    {
        $this->id_extra=$id_extra;
    }

    public function setPreco($preco)
    {
        $this->preco=$preco;
    }

    public function setDescricao($descricao)
    {
        $this->descricao=$descricao;
    }
}
