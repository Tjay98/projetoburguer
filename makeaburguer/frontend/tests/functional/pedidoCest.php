<?php

namespace frontend\tests\functional;

use frontend\tests\FunctionalTester;
use common\fixtures\UserFixture;

/**
 * Class LoginCest
 */
class pedidoCest
{
    /**
     * Load fixtures before db transaction begin
     * Called in _before()
     * @see \Codeception\Module\Yii2::_before()
     * @see \Codeception\Module\Yii2::loadFixtures()
     * @return array
     */
    public function _fixtures()
    {
        return [
            'user' => [
                'class' => UserFixture::className(),
                'dataFile' => codecept_data_dir() . 'login_data.php'
            ]
        ];
    }
    
    /**
     * @param FunctionalTester $I
     */
    public function pedidoCest(FunctionalTester $I)
    {
        $I->amOnPage('/site/login');
        $I->fillField('Username', 'rodolfo');
        $I->fillField('Password', '123456789');
        $I->click('login-button');

        $I->click('Pedido');
        $I->see('Criar pedido com hambúrguer customizado');
        $I->click('.btn-primary');
        $I->see('Voltar à seleção de tipo');
        $I->see('Seu hambúrguer');
        $I->see('Pao','.control-label');
        $I->selectOption('Pao', 'pao');
        $I->selectOption('Carne', 'carne');
        $I->click('Efetuar Pedido');
       
    }
    
}
