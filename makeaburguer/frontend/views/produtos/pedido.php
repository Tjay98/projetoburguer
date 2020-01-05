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

        <h1>INSERIR PEDIDO DINAMICO</h1>
        </div>

        <?php if(!empty($pedidos)){
        foreach($pedidos as $pedido): ?>
            <?=$pedido->nome?>
        <?php endforeach;}
        else{
            echo"ola";
        }?>
    </div>

    <div class="body-content">



    </div>
</div>
