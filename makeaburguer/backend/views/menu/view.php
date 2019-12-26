<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Menu */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Menus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="menu-view">

    <?Php if(Yii::$app->user->can('admin')){?>
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
    <?php }?>
    <?php
    echo 'ID - ',$model->id;
    echo "<br>";
    if(!empty($hamburger)) {
        echo 'ID - ', $model->id_hamburger;
        echo "<br>";
        echo 'ID - ', $hamburger->nome;
        echo "<br>";
    }
    if(!empty($bebida)) {
        echo 'ID - ', $model->id_bebida;
        echo "<br>";
        echo 'ID - ', $bebida->nome;
        echo "<br>";
    }
    if(!empty($complemento)) {
        echo 'ID - ', $model->id_complemento;
        echo "<br>";
        echo 'ID - ', $complemento->nome;
        echo "<br>";
    }
    if(!empty($sobremesa)) {
        echo 'ID - ', $model->id_sobremesa;
        echo "<br>";
        echo 'ID - ',$sobremesa->nome;
        echo "<br>";
    }
    echo 'ID - ',$model->preco;
    echo "<br>";
    echo 'ID - ',$model->descricao;
    echo "<br>";

    ?>

</div>
