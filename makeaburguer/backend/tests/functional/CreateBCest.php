<?php

namespace backend\tests\functional;

use backend\tests\FunctionalTester;
use common\fixtures\UserFixture;

class CreateBCest
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

    public function createBCest(FunctionalTester $I)
    {   
        $I->amOnPage('/site/login');
        $I->fillField('username', 'rodolfo');
        $I->fillField('password', '123456789');
        $I->click('login-button');
       
        $I->amOnPage('/hamburguer/create');
        $I->fillField('Nome','teste');
        $I->selectOption('Pão', 'pao');
        $I->selectOption('Carne', 'carne');
        $I->fillField('Descrição', '2');
        $I->click('.btn');

    }
}