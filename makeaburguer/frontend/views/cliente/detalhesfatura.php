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
        <?php  foreach ($pedidos as $pedido): ?>

            <?php if(!empty($pedidos)){

                echo "<tr><td>".$pedido->data."</td></tr>";?>

            <?php }
            else{
                echo"<h3>Ainda não efetuou nenhum pedido</h3>";
            }?>
        <?php endforeach; ?>

    </div>
</div>