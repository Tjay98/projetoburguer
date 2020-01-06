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

        <?php if(!empty($session)){
            if (!empty($session['hamburguer'])){
                foreach($session['hamburguer'] as $hamburguer) {
                    echo $hamburguer->nome;
                    echo $hamburguer->id;
                }
            }
            /*
            if (!empty($session['bebida'])){
                foreach($session['bebida'] as $bebida) {
                echo $bebida->id;
                }
            }
            if (!empty($session['sobremesa'])){  
                foreach($session['sobremesa'] as $sobremesa) {
                    echo $sobremesa->nome;
                }
            }
            if (!empty($session['hamburguer'])){
                foreach($session['acompanhamento'] as $acompanhamento) {
                echo $acompanhamento->nome;
                }
            }*/

        
        ?>
            
        <?php }
        else{
            echo"<h3>Atualmente não selecionou nenhum produto, pode o fazer através das abas respetivas</h3>";
        }?>
    </div>
            </div>
        </div>
        
</div>
