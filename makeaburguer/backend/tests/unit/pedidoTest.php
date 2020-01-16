<?php namespace backend\tests;

use app\models\Pedido;
use common\fixtures\UserFixture;

class pedidoTest extends \Codeception\Test\Unit
{
    /**
     * @var \backend\tests\UnitTester
     */
    protected $tester;
    
    public function _fixtures()
    {
        return [
            'user' => [
                'class' => UserFixture::className(),
                'dataFile' => codecept_data_dir() . 'login_data.php'
            ]
        ];
    }
    // tests
    public function testSomeFeature()
    {
        $model= new Pedido();
// id_user
        $model->setId_user('lorem ipsum dolor sit amet consectetur adipiscing elit vulputate aliquam sagittis metus nisl ridiculus euismod ornare tincidunt nec interdum lobortis aptent imperdiet bibendum dapibus sed sociosqu nostra dui penatibus venenatis phasellus non quam faucibus rutrum vel magnis quisque arcu lacus eu luctus porta diam tempor facilisis vitae ultricies semper cras maximus consequat fermentum vivamus tristique iaculis ante commodo felis suspendisse fames dis integer ligula taciti habitasse mus nulla elementum pellentesque feugiat senectus inceptos curabitur lectus laoreet ex ultrices himenaeos vestibulum libero primis facilisi mi mollis turpis est erat pretium velit orci purus aenean sollicitudin odio mauris duis congue nam netus1');
        $this->assertFalse($model->validate(['id_user']));
        $model->setId_user('12345678966');
        $this->assertFalse($model->validate(['id_user']));
        
        $model->setId_user('3');
       // $this->assertTrue($model->validate(['id_user']));

//id_menu
        $model->setId_menu('lorem ipsum dolor sit amet consectetur adipiscing elit vulputate aliquam sagittis metus nisl ridiculus euismod ornare tincidunt nec interdum lobortis aptent imperdiet bibendum dapibus sed sociosqu nostra dui penatibus venenatis phasellus non quam faucibus rutrum vel magnis quisque arcu lacus eu luctus porta diam tempor facilisis vitae ultricies semper cras maximus consequat fermentum vivamus tristique iaculis ante commodo felis suspendisse fames dis integer ligula taciti habitasse mus nulla elementum pellentesque feugiat senectus inceptos curabitur lectus laoreet ex ultrices himenaeos vestibulum libero primis facilisi mi mollis turpis est erat pretium velit orci purus aenean sollicitudin odio mauris duis congue nam netus1');
        $this->assertFalse($model->validate(['id_menu']));
        $model->setId_menu('12345678966');
        $this->assertFalse($model->validate(['id_menu']));
        
        $model->setId_menu('7');
        $this->assertTrue($model->validate(['id_menu']));

        //promcao
        $model->setPromocao('lorem ipsum dolor sit amet consectetur adipiscing elit vulputate aliquam sagittis metus nisl ridiculus euismod ornare tincidunt nec interdum lobortis aptent imperdiet bibendum dapibus sed sociosqu nostra dui penatibus venenatis phasellus non quam faucibus rutrum vel magnis quisque arcu lacus eu luctus porta diam tempor facilisis vitae ultricies semper cras maximus consequat fermentum vivamus tristique iaculis ante commodo felis suspendisse fames dis integer ligula taciti habitasse mus nulla elementum pellentesque feugiat senectus inceptos curabitur lectus laoreet ex ultrices himenaeos vestibulum libero primis facilisi mi mollis turpis est erat pretium velit orci purus aenean sollicitudin odio mauris duis congue nam netus1');
        $this->assertFalse($model->validate(['promocao']));
        $model->setPromocao('12345678966');
        $this->assertFalse($model->validate(['promocao']));
        
        $model->setPromocao('9');
        $this->assertTrue($model->validate(['promocao']));

        //preco
        $model->setPreco('lorem ipsum dolor sit amet consectetur adipiscing elit vulputate aliquam sagittis metus nisl ridiculus euismod ornare tincidunt nec interdum lobortis aptent imperdiet bibendum dapibus sed sociosqu nostra dui penatibus venenatis phasellus non quam faucibus rutrum vel magnis quisque arcu lacus eu luctus porta diam tempor facilisis vitae ultricies semper cras maximus consequat fermentum vivamus tristique iaculis ante commodo felis suspendisse fames dis integer ligula taciti habitasse mus nulla elementum pellentesque feugiat senectus inceptos curabitur lectus laoreet ex ultrices himenaeos vestibulum libero primis facilisi mi mollis turpis est erat pretium velit orci purus aenean sollicitudin odio mauris duis congue nam netus1');
        $this->assertFalse($model->validate(['preco']));
        $model->setPreco('123456eee78966');
        $this->assertFalse($model->validate(['preco']));
        
        $model->setPreco('9.92');
        $this->assertTrue($model->validate(['preco']));

        //data
        $model->setData('lorem ipsum dolor sit amet consectetur adipiscing elit vulputate aliquam sagittis metus nisl ridiculus euismod ornare tincidunt nec interdum lobortis aptent imperdiet bibendum dapibus sed sociosqu nostra dui penatibus venenatis phasellus non quam faucibus rutrum vel magnis quisque arcu lacus eu luctus porta diam tempor facilisis vitae ultricies semper cras maximus consequat fermentum vivamus tristique iaculis ante commodo felis suspendisse fames dis integer ligula taciti habitasse mus nulla elementum pellentesque feugiat senectus inceptos curabitur lectus laoreet ex ultrices himenaeos vestibulum libero primis facilisi mi mollis turpis est erat pretium velit orci purus aenean sollicitudin odio mauris duis congue nam netus1');
        $this->assertTrue($model->validate(['data']));
        $model->setData('11sadsa23456eee78966');
        $this->assertTrue($model->validate(['data']));
        
        $model->setData('2020-01-13 03:54:39');
        $this->assertTrue($model->validate(['dat']));

        $model->save();

        //$this->tester->seeRecord('app\models\Pedido', ['id_menu' => '3']);
        $this->tester->dontSeeRecord('app\models\Pedido', ['id_menu' => 'manel']);
    
    }
}