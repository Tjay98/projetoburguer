<?php namespace backend\tests;

use app\models\Menu;

class menuTest extends \Codeception\Test\Unit
{
    /**
     * @var \backend\tests\UnitTester
     */
    protected $tester;
    

    // tests
    public function testSomeFeature()
    {
        $model = new Menu();

        //id
        $model->setId_hamburguer('lorem ipsum dolor sit amet consectetur adipiscing elit vulputate aliquam sagittis metus nisl ridiculus euismod ornare tincidunt nec interdum lobortis aptent imperdiet bibendum dapibus sed sociosqu nostra dui penatibus venenatis phasellus non quam faucibus rutrum vel magnis quisque arcu lacus eu luctus porta diam tempor facilisis vitae ultricies semper cras maximus consequat fermentum vivamus tristique iaculis ante commodo felis suspendisse fames dis integer ligula taciti habitasse mus nulla elementum pellentesque feugiat senectus inceptos curabitur lectus laoreet ex ultrices himenaeos vestibulum libero primis facilisi mi mollis turpis est erat pretium velit orci purus aenean sollicitudin odio mauris duis congue nam netus1');
        $this->assertFalse($model->validate(['id']));
        $model->setId(222);
        $this->assertTrue($model->validate(['id']));

        //id_hamburguer
        $model->setId_hamburguer('lorem ipsum dolor sit amet consectetur adipiscing elit vulputate aliquam sagittis metus nisl ridiculus euismod ornare tincidunt nec interdum lobortis aptent imperdiet bibendum dapibus sed sociosqu nostra dui penatibus venenatis phasellus non quam faucibus rutrum vel magnis quisque arcu lacus eu luctus porta diam tempor facilisis vitae ultricies semper cras maximus consequat fermentum vivamus tristique iaculis ante commodo felis suspendisse fames dis integer ligula taciti habitasse mus nulla elementum pellentesque feugiat senectus inceptos curabitur lectus laoreet ex ultrices himenaeos vestibulum libero primis facilisi mi mollis turpis est erat pretium velit orci purus aenean sollicitudin odio mauris duis congue nam netus1');
        $this->assertFalse($model->validate(['id_hamburguer']));
        $model->setId_hamburguer('Teste');
        $this->assertFalse($model->validate(['id_hamburguer']));

        $model->setId_hamburguer('4');
        $this->assertTrue($model->validate(['id_hamburguer']));

        //id_bebida
        $model->setId_bebida('lorem ipsum dolor sit amet consectetur adipiscing elit vulputate aliquam sagittis metus nisl ridiculus euismod ornare tincidunt nec interdum lobortis aptent imperdiet bibendum dapibus sed sociosqu nostra dui penatibus venenatis phasellus non quam faucibus rutrum vel magnis quisque arcu lacus eu luctus porta diam tempor facilisis vitae ultricies semper cras maximus consequat fermentum vivamus tristique iaculis ante commodo felis suspendisse fames dis integer ligula taciti habitasse mus nulla elementum pellentesque feugiat senectus inceptos curabitur lectus laoreet ex ultrices himenaeos vestibulum libero primis facilisi mi mollis turpis est erat pretium velit orci purus aenean sollicitudin odio mauris duis congue nam netus1');
        $this->assertFalse($model->validate(['id_bebida']));
        $model->setId_bebida('Teste');
        $this->assertFalse($model->validate(['id_bebida']));

        $model->setId_bebida('1');
        $this->assertTrue($model->validate(['id_bebida']));

        //id_complemento
        $model->setId_complemento('lorem ipsum dolor sit amet consectetur adipiscing elit vulputate aliquam sagittis metus nisl ridiculus euismod ornare tincidunt nec interdum lobortis aptent imperdiet bibendum dapibus sed sociosqu nostra dui penatibus venenatis phasellus non quam faucibus rutrum vel magnis quisque arcu lacus eu luctus porta diam tempor facilisis vitae ultricies semper cras maximus consequat fermentum vivamus tristique iaculis ante commodo felis suspendisse fames dis integer ligula taciti habitasse mus nulla elementum pellentesque feugiat senectus inceptos curabitur lectus laoreet ex ultrices himenaeos vestibulum libero primis facilisi mi mollis turpis est erat pretium velit orci purus aenean sollicitudin odio mauris duis congue nam netus1');
        $this->assertFalse($model->validate(['id_complemento']));
        $model->setId_complemento('Teste');
        $this->assertFalse($model->validate(['id_complemento']));

        $model->setId_complemento('13');
        $this->assertTrue($model->validate(['id_complemento']));

        //id_sobremesa
        $model->setId_sobremesa('lorem ipsum dolor sit amet consectetur adipiscing elit vulputate aliquam sagittis metus nisl ridiculus euismod ornare tincidunt nec interdum lobortis aptent imperdiet bibendum dapibus sed sociosqu nostra dui penatibus venenatis phasellus non quam faucibus rutrum vel magnis quisque arcu lacus eu luctus porta diam tempor facilisis vitae ultricies semper cras maximus consequat fermentum vivamus tristique iaculis ante commodo felis suspendisse fames dis integer ligula taciti habitasse mus nulla elementum pellentesque feugiat senectus inceptos curabitur lectus laoreet ex ultrices himenaeos vestibulum libero primis facilisi mi mollis turpis est erat pretium velit orci purus aenean sollicitudin odio mauris duis congue nam netus1');
        $this->assertFalse($model->validate(['id_sobremesa']));
        $model->setId_sobremesa('Teste');
        $this->assertFalse($model->validate(['id_sobremesa']));

        $model->setId_sobremesa('13');
        $this->assertTrue($model->validate(['id_sobremesa']));

        //id_extra
        $model->setId_extra('lorem ipsum dolor sit amet consectetur adipiscing elit vulputate aliquam sagittis metus nisl ridiculus euismod ornare tincidunt nec interdum lobortis aptent imperdiet bibendum dapibus sed sociosqu nostra dui penatibus venenatis phasellus non quam faucibus rutrum vel magnis quisque arcu lacus eu luctus porta diam tempor facilisis vitae ultricies semper cras maximus consequat fermentum vivamus tristique iaculis ante commodo felis suspendisse fames dis integer ligula taciti habitasse mus nulla elementum pellentesque feugiat senectus inceptos curabitur lectus laoreet ex ultrices himenaeos vestibulum libero primis facilisi mi mollis turpis est erat pretium velit orci purus aenean sollicitudin odio mauris duis congue nam netus1');
        $this->assertFalse($model->validate(['id_extra']));
        $model->setId_extra('Teste');
        $this->assertFalse($model->validate(['id_extra']));

        $model->setId_extra('13');
        $this->assertTrue($model->validate(['id_extra']));

        //preco
        $model->setPreco('lorem ipsum dolor sit amet consectetur adipiscing elit vulputate aliquam sagittis metus nisl ridiculus euismod ornare tincidunt nec interdum lobortis aptent imperdiet bibendum dapibus sed sociosqu nostra dui penatibus venenatis phasellus non quam faucibus rutrum vel magnis quisque arcu lacus eu luctus porta diam tempor facilisis vitae ultricies semper cras maximus consequat fermentum vivamus tristique iaculis ante commodo felis suspendisse fames dis integer ligula taciti habitasse mus nulla elementum pellentesque feugiat senectus inceptos curabitur lectus laoreet ex ultrices himenaeos vestibulum libero primis facilisi mi mollis turpis est erat pretium velit orci purus aenean sollicitudin odio mauris duis congue nam netus1');
        $this->assertFalse($model->validate(['preco']));
        $model->setPreco('Teste');
        $this->assertFalse($model->validate(['preco']));
        $model->setPreco('2.9213333333333333333333332222222223333333333333333333322222222233333333333333333333222222222333333333333333333332222222223333333333333333333322222222233333333333333333333222222222333333333333333333332222222223333333333333333333322222222233333333333333333333222222222333333333333333333332222222223333333333333333333322222222233333333333333333333222222222333333333333333333332222222222222222333');
        $this->assertTrue($model->validate(['preco']));

        $model->setPreco('2.91');
        $this->assertTrue($model->validate(['preco']));

        //descricao
        $model->setDescricao('lorem ipsum dolor sit amet consectetur adipiscing elit vulputate aliquam sagittis metus nisl ridiculus euismod ornare tincidunt nec interdum lobortis aptent imperdiet bibendum dapibus sed sociosqu nostra dui penatibus venenatis phasellus non quam faucibus rutrum vel magnis quisque arcu lacus eu luctus porta diam tempor facilisis vitae ultricies semper cras maximus consequat fermentum vivamus tristique iaculis ante commodo felis suspendisse fames dis integer ligula taciti habitasse mus nulla elementum pellentesque feugiat senectus inceptos curabitur lectus laoreet ex ultrices himenaeos vestibulum libero primis facilisi mi mollis turpis est erat pretium velit orci purus aenean sollicitudin odio mauris duis congue nam netus1lorem ipsum dolor sit amet consectetur adipiscing elit vulputate aliquam sagittis metus nisl ridiculus euismod ornare tincidunt nec interdum lobortis aptent imperdiet bibendum dapibus sed sociosqu nostra dui penatibus venenatis phasellus non quam faucibus rutrum vel magnis quisque arcu lacus eu luctus porta diam tempor facilisis vitae ultricies semper cras maximus consequat fermentum vivamus tristique iaculis ante commodo felis suspendisse fames dis integer ligula taciti habitasse mus nulla elementum pellentesque feugiat senectus inceptos curabitur lectus laoreet ex ultrices himenaeos vestibulum libero primis facilisi mi mollis turpis est erat pretium velit orci purus aenean sollicitudin odio mauris duis congue nam netus1lorem ipsum dolor sit amet consectetur adipiscing elit vulputate aliquam sagittis metus nisl ridiculus euismod ornare tincidunt nec interdum lobortis aptent imperdiet bibendum dapibus sed sociosqu nostra dui penatibus venenatis phasellus non quam faucibus rutrum vel magnis quisque arcu lacus eu luctus porta diam tempor facilisis vitae ultricies semper cras maximus consequat fermentum vivamus tristique iaculis ante commodo felis suspendisse fames dis integer ligula taciti habitasse mus nulla elementum pellentesque feugiat senectus inceptos curabitur lectus laoreet ex ultrices himenaeos vestibulum libero primis facilisi mi mollis turpis est erat pretium velit orci purus aenean sollicitudin odio mauris duis congue nam netus1lorem ipsum dolor sit amet consectetur adipiscing elit vulputate aliquam sagittis metus nisl ridiculus euismod ornare tincidunt nec interdum lobortis aptent imperdiet bibendum dapibus sed sociosqu nostra dui penatibus venenatis phasellus non quam faucibus rutrum vel magnis quisque arcu lacus eu luctus porta diam tempor facilisis vitae ultricies semper cras maximus consequat fermentum vivamus tristique iaculis ante commodo felis suspendisse fames dis integer ligula taciti habitasse mus nulla elementum pellentesque feugiat senectus inceptos curabitur lectus laoreet ex ultrices himenaeos vestibulum libero primis facilisi mi mollis turpis est erat pretium velit orci purus aenean sollicitudin odio mauris duis congue nam netus1lorem ipsum dolor sit amet consectetur adipiscing elit vulputate aliquam sagittis metus nisl ridiculus euismod ornare tincidunt nec interdum lobortis aptent imperdiet bibendum dapibus sed sociosqu nostra dui penatibus venenatis phasellus non quam faucibus rutrum vel magnis quisque arcu lacus eu luctus porta diam tempor facilisis vitae ultricies semper cras maximus consequat fermentum vivamus tristique iaculis ante commodo felis suspendisse fames dis integer ligula taciti habitasse mus nulla elementum pellentesque feugiat senectus inceptos curabitur lectus laoreet ex ultrices himenaeos vestibulum libero primis facilisi mi mollis turpis est erat pretium velit orci purus aenean sollicitudin odio mauris duis congue nam netus1lorem ipsum dolor sit amet consectetur adipiscing elit vulputate aliquam sagittis metus nisl ridiculus euismod ornare tincidunt nec interdum lobortis aptent imperdiet bibendum dapibus sed sociosqu nostra dui penatibus venenatis phasellus non quam faucibus rutrum vel magnis quisque arcu lacus eu luctus porta diam tempor facilisis vitae ultricies semper cras maximus consequat fermentum vivamus tristique iaculis ante commodo felis suspendisse fames dis integer ligula taciti habitasse mus nulla elementum pellentesque feugiat senectus inceptos curabitur lectus laoreet ex ultrices himenaeos vestibulum libero primis facilisi mi mollis turpis est erat pretium velit orci purus aenean sollicitudin odio mauris duis congue nam netus1lorem ipsum dolor sit amet consectetur adipiscing elit vulputate aliquam sagittis metus nisl ridiculus euismod ornare tincidunt nec interdum lobortis aptent imperdiet bibendum dapibus sed sociosqu nostra dui penatibus venenatis phasellus non quam faucibus rutrum vel magnis quisque arcu lacus eu luctus porta diam tempor facilisis vitae ultricies semper cras maximus consequat fermentum vivamus tristique iaculis ante commodo felis suspendisse fames dis integer ligula taciti habitasse mus nulla elementum pellentesque feugiat senectus inceptos curabitur lectus laoreet ex ultrices himenaeos vestibulum libero primis facilisi mi mollis turpis est erat pretium velit orci purus aenean sollicitudin odio mauris duis congue nam netus1lorem ipsum dolor sit amet consectetur adipiscing elit vulputate aliquam sagittis metus nisl ridiculus euismod ornare tincidunt nec interdum lobortis aptent imperdiet bibendum dapibus sed sociosqu nostra dui penatibus venenatis phasellus non quam faucibus rutrum vel magnis quisque arcu lacus eu luctus porta diam tempor facilisis vitae ultricies semper cras maximus consequat fermentum vivamus tristique iaculis ante commodo felis suspendisse fames dis integer ligula taciti habitasse mus nulla elementum pellentesque feugiat senectus inceptos curabitur lectus laoreet ex ultrices himenaeos vestibulum libero primis facilisi mi mollis turpis est erat pretium velit orci purus aenean sollicitudin odio mauris duis congue nam netus1lorem ipsum dolor sit amet consectetur adipiscing elit vulputate aliquam sagittis metus nisl ridiculus euismod ornare tincidunt nec interdum lobortis aptent imperdiet bibendum dapibus sed sociosqu nostra dui penatibus venenatis phasellus non quam faucibus rutrum vel magnis quisque arcu lacus eu luctus porta diam tempor facilisis vitae ultricies semper cras maximus consequat fermentum vivamus tristique iaculis ante commodo felis suspendisse fames dis integer ligula taciti habitasse mus nulla elementum pellentesque feugiat senectus inceptos curabitur lectus laoreet ex ultrices himenaeos vestibulum libero primis facilisi mi mollis turpis est erat pretium velit orci purus aenean sollicitudin odio mauris duis congue nam netus1lorem ipsum dolor sit amet consectetur adipiscing elit vulputate aliquam sagittis metus nisl ridiculus euismod ornare tincidunt nec interdum lobortis aptent imperdiet bibendum dapibus sed sociosqu nostra dui penatibus venenatis phasellus non quam faucibus rutrum vel magnis quisque arcu lacus eu luctus porta diam tempor facilisis vitae ultricies semper cras maximus consequat fermentum vivamus tristique iaculis ante commodo felis suspendisse fames dis integer ligula taciti habitasse mus nulla elementum pellentesque feugiat senectus inceptos curabitur lectus laoreet ex ultrices himenaeos vestibulum libero primis facilisi mi mollis turpis est erat pretium velit orci purus aenean sollicitudin odio mauris duis congue nam netus1');
        $this->assertTrue($model->validate(['descricao']));

        $model->setDescricao('TESTES');
        $this->assertTrue($model->validate(['descricao']));

        $model->save();

        $this->tester->seeRecord('app\models\Menu', ['id' => '222']);
        $this->tester->dontSeeRecord('app\models\Menu', ['id' => '11']);

    }
}