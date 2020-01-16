<?php namespace backend\tests;

use app\models\Promocoes;

class promocaoTest extends \Codeception\Test\Unit
{
    /**
     * @var \backend\tests\UnitTester
     */
    protected $tester;
    
    // tests
    public function testPromocao()
    {
        $model= new Promocoes();

        $model->setNome('lorem ipsum dolor sit amet consectetur adipiscing elit vulputate aliquam sagittis metus nisl ridiculus euismod ornare tincidunt nec interdum lobortis aptent imperdiet bibendum dapibus sed sociosqu nostra dui penatibus venenatis phasellus non quam faucibus rutrum vel magnis quisque arcu lacus eu luctus porta diam tempor facilisis vitae ultricies semper cras maximus consequat fermentum vivamus tristique iaculis ante commodo felis suspendisse fames dis integer ligula taciti habitasse mus nulla elementum pellentesque feugiat senectus inceptos curabitur lectus laoreet ex ultrices himenaeos vestibulum libero primis facilisi mi mollis turpis est erat pretium velit orci purus aenean sollicitudin odio mauris duis congue nam netus1');
        $this->assertFalse($model->validate(['nome']));
        $model->setNome('Teste');
        $this->assertTrue($model->validate(['nome']));

        $model->setValor('Teste');
        $this->assertFalse($model->validate(['valor']));
        $model->setValor('1.0');
        $this->assertTrue($model->validate(['valor']));

        $model->setData_fim('lorem ipsum dolor sit amet consectetur adipiscing elit vulputate aliquam sagittis metus nisl ridiculus euismod ornare tincidunt nec interdum lobortis aptent imperdiet bibendum dapibus sed sociosqu nostra dui penatibus venenatis phasellus non quam faucibus rutrum vel magnis quisque arcu lacus eu luctus porta diam tempor facilisis vitae ultricies semper cras maximus consequat fermentum vivamus tristique iaculis ante commodo felis suspendisse fames dis integer ligula taciti habitasse mus nulla elementum pellentesque feugiat senectus inceptos curabitur lectus laoreet ex ultrices himenaeos vestibulum libero primis facilisi mi mollis turpis est erat pretium velit orci purus aenean sollicitudin odio mauris duis congue nam netus1');
        $this->assertFalse($model->validate(['data_fim']));
        $model->setData_fim('1578092400');
        $this->assertTrue($model->validate(['data_fim']));
        
        $model->setData_inicio('lorem ipsum dolor sit amet consectetur adipiscing elit vulputate aliquam sagittis metus nisl ridiculus euismod ornare tincidunt nec interdum lobortis aptent imperdiet bibendum dapibus sed sociosqu nostra dui penatibus venenatis phasellus non quam faucibus rutrum vel magnis quisque arcu lacus eu luctus porta diam tempor facilisis vitae ultricies semper cras maximus consequat fermentum vivamus tristique iaculis ante commodo felis suspendisse fames dis integer ligula taciti habitasse mus nulla elementum pellentesque feugiat senectus inceptos curabitur lectus laoreet ex ultrices himenaeos vestibulum libero primis facilisi mi mollis turpis est erat pretium velit orci purus aenean sollicitudin odio mauris duis congue nam netus1');
        $this->assertFalse($model->validate(['data_inicio']));
        $model->setData_inicio('1578092400');
        $this->assertTrue($model->validate(['data_inicio']));

        $model->save();

        $this->tester->seeRecord('app\models\Promocoes', ['nome' => 'Teste']);
        $this->tester->dontSeeRecord('app\models\Promocoes', ['nome' => 'Teste']);

    }
}