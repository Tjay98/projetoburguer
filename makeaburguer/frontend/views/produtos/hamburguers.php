<?php

/* @var $this yii\web\View */


use yii\bootstrap\Button;
use yii\bootstrap\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\LinkPager;
use yii\widgets\Pjax;

$this->title = 'Hamburguers';
?>
<div class="site-index">
    <center><h2>Veja os hamburguers atuais</h2></center>
    <hr>
    <div class="jumbotron">
        <div class="col-lg-12">

            <?php Pjax::begin() ?>
            <?php  foreach ($hamburguers as $hamburguer): ?>
                <div class="col-lg-6 col-md-6">
                    <div class="container">
                        <h2><?= $hamburguer->nome ?></h2>
                        <div><?php echo Html::img(Yii::$app->request->baseUrl.'/backend/web/'.$hamburguer->imagem,['class'=>'imagemproduto'])?></div>
                        <hr>
                        <h4>Ver Hamburguer:</h4>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">

                            <label class="btn btn-secondary">
                                <button id="cartA"><?= Html::a('Info<br>
                                            <p class="glyphicon glyphicon-search" style="color:white"></p>',
                                            ['produtos/infohamburguer', 'id' => $hamburguer->id],
                                            ['id' => 'infoa'],
                                            ['class'=>'button']) ?>
                                </button>
                            </label>
                            <label class="btn btn-secondary">
                                <button id="cartB"><?= Html::a('Adicionar ao pedido<br>
                                            <p class="glyphicon glyphicon-shopping-cart" style="color:white"></p>',
                                            ['produtos/pedido', 'id' => $hamburguer->id],
                                            ['id' => 'infoa'],
                                            ['class'=>'button']) ?>
                                </button>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>




        </div>
    </div> <?= LinkPager::widget(['pagination' => $pagination]) ?>
            <?php Pjax::end(); ?>


</div>
