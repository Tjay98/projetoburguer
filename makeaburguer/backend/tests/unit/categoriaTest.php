<?php 
namespace backend\tests;

use app\models\Categoria;
use common\fixtures\UserFixture;

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
        $model->setNome(null);
        $this->assertFalse($model->validate(['nome']));
       // $model->save();
    }

}