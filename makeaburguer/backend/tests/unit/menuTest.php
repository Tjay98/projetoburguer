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

        
        $model->setNome('lorem ipsum dolor sit amet consectetur adipiscing elit vulputate aliquam sagittis metus nisl ridiculus euismod ornare tincidunt nec interdum lobortis aptent imperdiet bibendum dapibus sed sociosqu nostra dui penatibus venenatis phasellus non quam faucibus rutrum vel magnis quisque arcu lacus eu luctus porta diam tempor facilisis vitae ultricies semper cras maximus consequat fermentum vivamus tristique iaculis ante commodo felis suspendisse fames dis integer ligula taciti habitasse mus nulla elementum pellentesque feugiat senectus inceptos curabitur lectus laoreet ex ultrices himenaeos vestibulum libero primis facilisi mi mollis turpis est erat pretium velit orci purus aenean sollicitudin odio mauris duis congue nam netus1');
        $this->assertFalse($model->validate(['nome']));
        $model->setNome('Teste');
        $this->assertTrue($model->validate(['nome']));

    }
}