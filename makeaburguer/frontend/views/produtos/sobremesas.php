<?php

/* @var $this yii\web\View */


use yii\bootstrap\Button;
use yii\bootstrap\Html;
use yii\web\View;
use yii\widgets\LinkPager;
use yii\widgets\Pjax;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <div class="col-lg-12">
            <?php Pjax::begin()?>
            <?php foreach ($sobremesas as $sobremesa): ?>
                <div class="col-lg-6">
                    <div class="container" id="hamburguercontainer">
                        <h2><?= $sobremesa->nome ?></h2>

                        <div><?php echo Html::img(Yii::$app->request->baseUrl.'/backend/web/'.$sobremesa->imagem,['class'=>'imagemproduto'])?></div>
                        <hr>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">

                            <label class="btn btn-secondary">
                                <button id="cartA"><?= Html::a('Info<br>
                                            <p class="glyphicon glyphicon-search" style="color:white"></p>',
                                            ['produtos/infoprodutos', 'id' => $sobremesa->id],
                                            ['id' => 'infoa'],
                                            ['class'=>'button']) ?>
                                </button>
                            </label>
                            <label class="btn btn-secondary">
                                <button id="cartB"><?= Html::a('Adicionar ao pedido<br>
                                            <p class="glyphicon glyphicon-shopping-cart" style="color:white"></p>',
                                            ['produtos/pedido', 'sobremesa' => $sobremesa->id],
                                            ['id' => 'infoa'],
                                            ['class'=>'button']) ?>
                                </button>

                        </div>
                    </div>
                </div>

            <?php endforeach; ?>


        </div>
    </div>
    <h4>Páginas</h4>
    <?= LinkPager::widget(['pagination' => $pagination]) ?>
    <?php Pjax::end(); ?>


</div>