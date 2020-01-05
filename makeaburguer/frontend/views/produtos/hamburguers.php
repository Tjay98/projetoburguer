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
                                <button id="infob"><?= Html::a('Info', ['produtos/infohamburguer', 'id' => $hamburguer->id],['id' => 'infoa'],['class'=>'button']) ?>
                                    <br>
                                    <p class="glyphicon glyphicon-search" style="color:white"></p>
                                </button>
                            </label>
                            <label class="btn btn-secondary">
                                <form action="<?=Url::to(['/produtos/pedido'])?>" method="post">
                                    <input name="teste" type="hidden" value="<?=$hamburguer->id?>">
                                <button id="addcart"><p id="letracart">Adicionar ao pedido</p><p class="glyphicon glyphicon-shopping-cart" id="carrinho"></p></button>
                            </label>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>




        </div>
    </div> <?= LinkPager::widget(['pagination' => $pagination]) ?>
            <?php Pjax::end(); ?>


</div>
