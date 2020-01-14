<?php namespace backend\tests;

use app\models\Categoria;

class categoriaTest extends \Codeception\Test\Unit
{
    /**
     * @var \backend\tests\UnitTester
     */
    protected $tester;
    
    protected $id;

    // tests
    public function testSomeFeature()
    {

        $model = new Categoria();
        $model->setNome('tests');
        $model->save();
    }
}