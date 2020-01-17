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

                    
                        <div class="card" ><center><h2 style='color:white'><?= $hamburguerI->nome ?></h2></center>
                            <div class="card-body">
                                <div><?php echo Html::img(Yii::$app->request->baseUrl.'/backend/web/'.$hamburguerI->imagem,['class'=>'imagemproduto'])?></div>
                                <hr>
                                <h2 style='color:white'>Descrição</h2>
                                <br>
                                <h2 style='color:white'><?= $hamburguerI->descricao ?></h2>
                                <hr>
                                <h2 style='color:white'>Preço: <?= $hamburguerI->preco ?> €</h2>
                            </div>
                        </div>
                  

            <?php endforeach; ?>




        </div>
    </div>


</div>
