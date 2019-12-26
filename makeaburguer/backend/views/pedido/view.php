<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pedido */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pedidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pedido-view">



    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Apagar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem a certeza que deseja apagar o item selecionado?',
                'method' => 'post',
            ],
        ]) ?>
    </p>


    <?php
    echo 'ID - ',$model->id;
    echo "<br>";
    echo $model->id_user;
    echo "<br>";
    echo $user->username;
    echo "<br>";
    echo $model->id_menu;
    echo "<br>";
    echo $model->preco;
    echo "<br>";
    echo $model->data;
    echo "<br>";
    echo $model->compra;
    echo "<br>";

      ?>

</div>
