<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PedidoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pedidos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pedido-index">

    <?Php if(Yii::$app->user->can('admin')){?>
    <p>
        <?= Html::a('Criar Pedido', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php }?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_cliente',
            'id_menu',
            'preco',
            'data',
            //'compra',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
