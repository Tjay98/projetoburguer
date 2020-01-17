<?php

/* @var $this yii\web\View */


use yii\bootstrap\Button;
use yii\bootstrap\Html;
use yii\web\View;


$this->title = 'Produtos';
?>
<div class="site-index">


    <div class="jumbotron">
        <div class="col-lg-12">

            <?php  foreach ($produto as $produtoI): ?>
                <div class="card" ><center><h2 style='color:white'><?= $produtoI->nome ?></h2></center>
                    <div class="card-body">
                        <div class="container">
                    <div><?php echo Html::img(Yii::$app->request->baseUrl.'/backend/web/'.$produtoI->imagem,['class'=>'imagemproduto'])?></div>
                    <hr>
                    <h2 style='color:white'>Preço: <?= $produtoI->preco ?> €</h2>
                        </div>
                    </div>
                </div>    
            <?php endforeach; ?>




        </div>
    </div>


</div>
