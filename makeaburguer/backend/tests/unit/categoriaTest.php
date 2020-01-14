<?php 
namespace backend\tests;

use app\models\Categoria;
use app\models\User;
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

        $model = new User();
        $this->assertUserIsValid($model);
        $this->assertUserIsAdmin($model);
       /* $model = new Categoria();
        $model->setNome(null);
        $this->assertFalse($model->validate(['nome']));
       // $model->save();*/
    }

}