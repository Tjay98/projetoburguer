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
        <div class="card" style="width: 50rem;"><center><H1 id="idperfil">Pedido</H1></center>
            <div class="card-body">
        </div>

        <?php if(!empty($pedidos)){
        foreach($pedidos as $pedido): ?>
            <?=$pedido->nome?>
        <?php endforeach;}
        else{
            echo"<h3>Atualmente não selecionou nenhum produto, pode o fazer através das abas respetivas</h3>";
        }?>
    </div>
            </div>
        </div>
        
</div>
