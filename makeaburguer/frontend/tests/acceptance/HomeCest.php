<?php
namespace frontend\tests\acceptance;

use frontend\tests\AcceptanceTester;
use yii\helpers\Url;

class HomeCest
{
    public function checkHome(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        //$I->see('veja os nossos produtos');
        $I->seeLink('Login');
        $I->click('Login');

      //  $I->seeLink('About');
       // $I->click('About');
        $I->wait(10); // wait for page to be opened
        $I->fillField('#loginform-username', 'rodolfo');
        $I->fillField('#loginform-password', '123456789');
        $I->click('Login');
        $I->wait(10);
        $I->see('perfil');
        $I->wait(10);
        //$I->see('This is the About page.');
    }
}
