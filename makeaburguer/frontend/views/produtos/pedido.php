<?php

/* @var $this yii\web\View */


use yii\bootstrap\Button;
use yii\bootstrap\Html;
use yii\web\View;

$this->title = 'Pedido';
?>
<div class="site-index">

    <div class="jumbotron">
        <div class="col-lg-12">
        <div class="card" style="width: 50rem;"><center><H1 id="idperfil">Pedido</H1></center>
            <div class="card-body">
        </div>

       <?php 
       $request = Yii::$app->request;
       if ($request->isPost) {?>
        <h3>Pedido Efetuado!</h3>
        


       <?php } else{ ?>
           <button data-toggle="collapse" data-target="#hamburguer" id='collapsepedido'>Hamburguer</button>

           <div id="hamburguer" class="collapse">
           Lorem ipsum dolor text....
           </div>

       <?php } ?>
        
    </div>
            </div>
        </div>
        
</div>
