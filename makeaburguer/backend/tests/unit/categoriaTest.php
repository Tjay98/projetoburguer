<?php 
namespace backend\tests;

use app\models\Categoria;

class categoriaTest extends \Codeception\Test\Unit
{
    /**
     * @var \backend\tests\UnitTester
     */
    protected $tester;

    // tests
    public function testSomeFeature()
    {
        $model = new Categoria();

        $model->setNome('Teste');
        $model->save();

        $this->assertTrue($model->validate(['Teste']));

        $this->assertEquals($model->getNome(),'Teste');

        $this->tester->seeRecord('app\models\Categoria', ['nome' => 'Teste']);
        
    }

}