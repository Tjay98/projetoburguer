<?php

use app\models\Cliente;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Cliente */

$this->title = 'pedido';

?>
<div class="cliente-view">

    <div class="card card-container">
        <center><H1 id="idperfil">INFO</H1></center>
        <?php if(!empty($pedidos)){ ?>

            <?php
                    echo $pedidos->data;
                    echo "<br>";
                    echo $pedidos->id_menu;
                
                        
                    if(!empty($bebida)){
                        echo $bebida->nome;
                        echo Html::img(Yii::$app->request->baseUrl.'/backend/web/'.$bebida->imagem,['class'=>'imagemproduto']);
                    }
                    if(!empty($complemento)){
                        echo $complemento->nome;
                        echo Html::img(Yii::$app->request->baseUrl.'/backend/web/'.$complemento->imagem,['class'=>'imagemproduto']);
                    }
                    if(!empty($sobremesa)){
                        echo $sobremesa->nome;
                        echo Html::img(Yii::$app->request->baseUrl.'/backend/web/'.$sobremesa->imagem,['class'=>'imagemproduto']);
                    }
                    if(!empty($extra)){
                        echo $extra->nome;
                        echo Html::img(Yii::$app->request->baseUrl.'/backend/web/'.$extra->imagem,['class'=>'imagemproduto']);
                    } 
                    ?>
        <?php }else{
            echo '<center><h2>Não selecionou nenhum pedido</h2></center>';
        } ?>  
      

    </div>
</div>
