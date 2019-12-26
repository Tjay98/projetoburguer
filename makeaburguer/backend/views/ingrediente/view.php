<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Ingrediente */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Ingredientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="ingrediente-view">


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
    echo 'ID - ',$model->nome;
    echo "<br>";
    echo 'ID - ',$cate->nome;
    echo "<br>";
    echo 'ID - ',$model->preco;
    echo "<br>";?>

</div>
