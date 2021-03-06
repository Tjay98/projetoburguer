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
class Hamburguer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hamburguer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'descricao', 'pao', 'carne'], 'required'],
            [['descricao'], 'string'],
            [['pao', 'molho', 'carne', 'vegetais', 'queijo', 'complemento'], 'integer'],
            [['preco'],'number'],
            [['nome'], 'string', 'max' => 30],
            [['imagem'], 'file','extensions'=>'jpg','skipOnEmpty' => true],
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
            'descricao' => 'Descrição',
            'pao' => 'Pao',
            'molho' => 'Molho',
            'carne' => 'Carne',
            'vegetais' => 'Vegetais',
            'queijo' => 'Queijo',
            'complemento' => 'Complemento',
            'preco' => 'Preço',
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

    public function setNome($nome)
    {
        $this->nome=$nome;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setImagem($imagem)
    {
        $this->imagem=$imagem;
    }

    public function getImagen()
    {
        return $this->imagen;
    }

    public function setDescricao($descricao)
    {
        $this->descricao=$descricao;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setPao($pao)
    {
        $this->pao=$pao;
    }

    public function getPao()
    {
        return $this->carne;
    }

    public function setCarne($carne)
    {
        $this->carne=$carne;
    }

    public function getCarne()
    {
        return $this->pao;
    }

    public function setPreco($preco)
    {
        $this->preco=$preco;
    }

    public function getPreco()
    {
        return $this->preco;
    }
}
