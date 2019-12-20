<?php

/* @var $this yii\web\View */


use yii\bootstrap\Button;
use yii\bootstrap\Html;
use yii\web\View;


$this->title = 'Hamburguers';
?>
<div class="site-index">


    <div class="jumbotron">
        <div class="col-lg-12">

            <?php  foreach ($hamburguer as $hamburguerI): ?>

                    <div class="container">
                        <h2><?= $hamburguerI->nome ?></h2>
                        <div><?php echo Html::img(Yii::$app->request->baseUrl.'/backend/web/'.$hamburguerI->imagem,['class'=>'imagemproduto'])?></div>
                        <hr>
                        <h3>Sobre:</h3>
                        <br>
                        <h2><?= $hamburguerI->descricao ?></h2>
                        <hr>
                        <h2>Preço: <?= $hamburguerI->preco ?> €</h2>
                    </div>

            <?php endforeach; ?>




        </div>
    </div>


</div>
