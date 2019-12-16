<?php
namespace frontend\models;

use Yii;
use backend\models\AuthAssignment;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $password_repeat;
    public $repeat;
    public $nif;
    public $telemovel;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required','message'=>'Preencha o nome de utilizador'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Este nome de utilizador já está registado.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required','message'=>'Preencha o email'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Este email já está registado.'],

            ['password', 'required','message'=>'Preencha a password'],
            ['password', 'string', 'min' => 6, 'max'=>25],
            ['password_repeat','compare','compareAttribute'=>'password','message'=>'As passwords devem corresponder'],

            ['nif','required','message'=>'Preencha o Nif'],
            ['nif','string','length'=>9],
            ['nif','unique','targetClass'=>'\common\models\User','message'=>'Este nif já está atribuido a outro utilizador'],

            ['telemovel','trim'],
//            ['telemovel','required','Preencha o numero de telemovel'],
            ['telemovel','string','length'=>9],


        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->nif=$this->nif;
            $user->telemovel=$this->telemovel;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            $user->generateEmailVerificationToken();
            $user->save();
            //dar a permissao de utilizador
            $permission="utilizador";
            $newpermission = new AuthAssignment();
            $newpermission->user_id = $user->id;
            $newpermission->item_name = $permission;
            $newpermission->save();

            return $user;
        }
        return null;



    }
}
