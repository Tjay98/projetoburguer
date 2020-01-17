<?php
namespace frontend\tests\acceptance;

use frontend\tests\AcceptanceTester;
use yii\helpers\Url;

class HomeCest
{
    public function checkHome(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->wait(5);
        //$I->see('veja os nossos produtos');
        $I->seeLink('Login');
        $I->click('Login');

      //  $I->seeLink('About');
       // $I->click('About');
        $I->wait(5); // wait for page to be opened
        $I->fillField('#loginform-username', 'rodolfo');
        $I->fillField('#loginform-password', '123456789');
        $I->click('login-button');
        $I->wait(5);
        $I->see('perfil');
        $I->wait(5);
        $I->seeLink('Logout');
        $I->click('Logout');
        $I->wait(5);
        //$I->see('This is the About page.');
    }
}
