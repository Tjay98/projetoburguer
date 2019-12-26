<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Hamburger */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Hamburgers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="hamburger-view">


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
    echo $model->nome;
    echo "<br>";
    echo $model->imagem;
    echo "<br>";
    echo $model->descricao;
    echo "<br>";
    echo $pao->id;
    echo "<br>";
    echo $pao->nome;
    echo "<br>";
    echo $carne->id;
    echo "<br>";
    echo $carne->nome;
    echo "<br>";
    if(!empty($molho)){
        echo $molho->nome;
        echo $molho->id;
    }
    echo "<br>";
    if(!empty($vegetais)) {
        echo $vegetais->nome;
        echo $vegetais->id;
    }
    echo "<br>";
    if(!empty($queijo)) {
        echo $queijo->nome;
        echo $queijo->id;
    }
    echo "<br>";
    if(!empty($complemente)) {
        echo $complemente->nome;
        echo $complemente->id;
    }
    echo $model->preco;
?>

</div>
