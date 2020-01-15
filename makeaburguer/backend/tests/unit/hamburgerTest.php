<?php namespace backend\tests;

use app\models\Hamburguer;

class hamburgerTest extends \Codeception\Test\Unit
{
    /**
     * @var \backend\tests\UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testSomeFeature()
    {
        $model= new Hamburguer();

        
        $model->setNome('1234567890123456789012345678901');
        $this->assertFalse($model->validate(['nome']));

        $model->setNome('Teste');
        $this->assertTrue($model->validate(['nome']));

        $model->setImagem('imagens/hamburguers/Teste.jpg');

        $model->setDescricao('teste');

        $model->setPao('sdsdv');
        $this->assertFalse($model->validate(['pao']));

        $model->setPao('1');
        $this->assertTrue($model->validate(['pao']));

        $model->setCarne('3');

        $model->setPreco('1.02');
        $model->save();
        $this->tester->dontSeeRecord('app\models\Hamburguer', ['nome' => 'manel']);
        $this->tester->seeRecord('app\models\Hamburguer', ['nome' => 'Teste']);

    }
}