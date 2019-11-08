<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hamburger".
 *
 * @property int $id
 * @property string $nome
 * @property string $preco
 * @property string $descricao
 * @property int $ingrediente1
 * @property int $ingrediente2
 * @property int $ingrediente3
 * @property int $ingrediente4
 * @property int $ingrediente5
 * @property int $ingrediente6
 * @property int $ingrediente7
 * @property int $ingrediente8
 * @property int $ingrediente9
 * @property int $ingrediente10
 * @property int $ingrediente_extra1
 * @property int $ingrediente_extra2
 * @property int $ingrediente_extra3
 * @property int $ingrediente_extra4
 * @property int $ingrediente_extra5
 *
 * @property Ingrediente $ingrediente11
 * @property Ingrediente $ingrediente100
 * @property Ingrediente $ingredienteExtra1
 * @property Ingrediente $ingredienteExtra2
 * @property Ingrediente $ingredienteExtra3
 * @property Ingrediente $ingredienteExtra4
 * @property Ingrediente $ingredienteExtra5
 * @property Ingrediente $ingrediente20
 * @property Ingrediente $ingrediente30
 * @property Ingrediente $ingrediente40
 * @property Ingrediente $ingrediente50
 * @property Ingrediente $ingrediente60
 * @property Ingrediente $ingrediente70
 * @property Ingrediente $ingrediente80
 * @property Ingrediente $ingrediente90
 * @property Menu[] $menus
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
            [['nome', 'preco'], 'required'],
            [['preco'], 'number'],
            [['ingrediente1', 'ingrediente2', 'ingrediente3', 'ingrediente4', 'ingrediente5', 'ingrediente6', 'ingrediente7', 'ingrediente8', 'ingrediente9', 'ingrediente10', 'ingrediente_extra1', 'ingrediente_extra2', 'ingrediente_extra3', 'ingrediente_extra4', 'ingrediente_extra5'], 'integer'],
            [['nome'], 'string', 'max' => 50],
            [['descricao'], 'string', 'max' => 255],
            [['ingrediente1'], 'exist', 'skipOnError' => true, 'targetClass' => Ingrediente::className(), 'targetAttribute' => ['ingrediente1' => 'id']],
            [['ingrediente10'], 'exist', 'skipOnError' => true, 'targetClass' => Ingrediente::className(), 'targetAttribute' => ['ingrediente10' => 'id']],
            [['ingrediente_extra1'], 'exist', 'skipOnError' => true, 'targetClass' => Ingrediente::className(), 'targetAttribute' => ['ingrediente_extra1' => 'id']],
            [['ingrediente_extra2'], 'exist', 'skipOnError' => true, 'targetClass' => Ingrediente::className(), 'targetAttribute' => ['ingrediente_extra2' => 'id']],
            [['ingrediente_extra3'], 'exist', 'skipOnError' => true, 'targetClass' => Ingrediente::className(), 'targetAttribute' => ['ingrediente_extra3' => 'id']],
            [['ingrediente_extra4'], 'exist', 'skipOnError' => true, 'targetClass' => Ingrediente::className(), 'targetAttribute' => ['ingrediente_extra4' => 'id']],
            [['ingrediente_extra5'], 'exist', 'skipOnError' => true, 'targetClass' => Ingrediente::className(), 'targetAttribute' => ['ingrediente_extra5' => 'id']],
            [['ingrediente2'], 'exist', 'skipOnError' => true, 'targetClass' => Ingrediente::className(), 'targetAttribute' => ['ingrediente2' => 'id']],
            [['ingrediente3'], 'exist', 'skipOnError' => true, 'targetClass' => Ingrediente::className(), 'targetAttribute' => ['ingrediente3' => 'id']],
            [['ingrediente4'], 'exist', 'skipOnError' => true, 'targetClass' => Ingrediente::className(), 'targetAttribute' => ['ingrediente4' => 'id']],
            [['ingrediente5'], 'exist', 'skipOnError' => true, 'targetClass' => Ingrediente::className(), 'targetAttribute' => ['ingrediente5' => 'id']],
            [['ingrediente6'], 'exist', 'skipOnError' => true, 'targetClass' => Ingrediente::className(), 'targetAttribute' => ['ingrediente6' => 'id']],
            [['ingrediente7'], 'exist', 'skipOnError' => true, 'targetClass' => Ingrediente::className(), 'targetAttribute' => ['ingrediente7' => 'id']],
            [['ingrediente8'], 'exist', 'skipOnError' => true, 'targetClass' => Ingrediente::className(), 'targetAttribute' => ['ingrediente8' => 'id']],
            [['ingrediente9'], 'exist', 'skipOnError' => true, 'targetClass' => Ingrediente::className(), 'targetAttribute' => ['ingrediente9' => 'id']],
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
            'descricao' => 'Descricao',
            'ingrediente1' => 'Ingrediente1',
            'ingrediente2' => 'Ingrediente2',
            'ingrediente3' => 'Ingrediente3',
            'ingrediente4' => 'Ingrediente4',
            'ingrediente5' => 'Ingrediente5',
            'ingrediente6' => 'Ingrediente6',
            'ingrediente7' => 'Ingrediente7',
            'ingrediente8' => 'Ingrediente8',
            'ingrediente9' => 'Ingrediente9',
            'ingrediente10' => 'Ingrediente10',
            'ingrediente_extra1' => 'Ingrediente Extra1',
            'ingrediente_extra2' => 'Ingrediente Extra2',
            'ingrediente_extra3' => 'Ingrediente Extra3',
            'ingrediente_extra4' => 'Ingrediente Extra4',
            'ingrediente_extra5' => 'Ingrediente Extra5',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIngrediente11()
    {
        return $this->hasOne(Ingrediente::className(), ['id' => 'ingrediente1']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIngrediente100()
    {
        return $this->hasOne(Ingrediente::className(), ['id' => 'ingrediente10']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIngredienteExtra1()
    {
        return $this->hasOne(Ingrediente::className(), ['id' => 'ingrediente_extra1']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIngredienteExtra2()
    {
        return $this->hasOne(Ingrediente::className(), ['id' => 'ingrediente_extra2']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIngredienteExtra3()
    {
        return $this->hasOne(Ingrediente::className(), ['id' => 'ingrediente_extra3']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIngredienteExtra4()
    {
        return $this->hasOne(Ingrediente::className(), ['id' => 'ingrediente_extra4']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIngredienteExtra5()
    {
        return $this->hasOne(Ingrediente::className(), ['id' => 'ingrediente_extra5']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIngrediente20()
    {
        return $this->hasOne(Ingrediente::className(), ['id' => 'ingrediente2']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIngrediente30()
    {
        return $this->hasOne(Ingrediente::className(), ['id' => 'ingrediente3']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIngrediente40()
    {
        return $this->hasOne(Ingrediente::className(), ['id' => 'ingrediente4']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIngrediente50()
    {
        return $this->hasOne(Ingrediente::className(), ['id' => 'ingrediente5']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIngrediente60()
    {
        return $this->hasOne(Ingrediente::className(), ['id' => 'ingrediente6']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIngrediente70()
    {
        return $this->hasOne(Ingrediente::className(), ['id' => 'ingrediente7']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIngrediente80()
    {
        return $this->hasOne(Ingrediente::className(), ['id' => 'ingrediente8']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIngrediente90()
    {
        return $this->hasOne(Ingrediente::className(), ['id' => 'ingrediente9']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenus()
    {
        return $this->hasMany(Menu::className(), ['id_hamburger' => 'id']);
    }
}
