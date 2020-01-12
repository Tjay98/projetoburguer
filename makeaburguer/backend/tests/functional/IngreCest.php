<?php
namespace backend\tests\functional;
use backend\tests\FunctionalTester;

use common\fixtures\UserFixture;

class IngreCest
{
    public function _fixtures()
    {
        return [
            'user' => [
                'class' => UserFixture::className(),
                'dataFile' => codecept_data_dir() . 'login_data.php'
            ]
        ];
    }

    public function insertIngre(FunctionalTester $I)
    { 
        $I->amOnPage('/site/login');
        $I->fillField('username', 'rodolfo');
        $I->fillField('password', '123456789');
        $I->click('login-button');

        $I->amOnPage('/ingrediente/create');
        $I->fillField('Nome','teste');
        $I->selectOption('Tipo', 'pao');
        $I->fillField('Preço', '2');
        $I->click('Guardar');

       /* $I->see('My Application');
        $I->dontSeeLink('Login');
        $I->dontSeeLink('Signup');*/
    }
}