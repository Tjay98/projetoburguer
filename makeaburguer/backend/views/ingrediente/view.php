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
    
</div>
<table class="table table-striped table-bordered detail-view">
    <tbody>
        <tr><th>ID</th><td><?php echo $model->id; ?></td></tr>
        <tr><th>Nome</th><td><?php echo $model->nome?></td></tr>
        <tr><th>Tipo</th><td><?php echo $cate->nome?></td></tr>
        <tr><th>Preço</th><td><?php echo $model->preco?></td></tr>
    </tbody>
</table>