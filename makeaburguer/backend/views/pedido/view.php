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

    <?Php if(Yii::$app->user->can('admin')){?>
        <p>
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Tem a certeza que deseja apagar o item selecionado? Se tiver um produto associado irá redirecionar para o mesmo',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
    <?php }?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_cliente',
            'id_menu',
            'preco',
            'data',
            'compra',
        ],
    ]) ?>

</div>
