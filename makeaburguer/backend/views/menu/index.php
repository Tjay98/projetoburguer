<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MenuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Menus';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-index">

    <?Php if(Yii::$app->user->can('admin')){?>
    <p>
        <?= Html::a('Criar Menu', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php }?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_hamburguer',
            'id_bebida',
            'id_complemento',
            'id_sobremesa',
            'id_extra',
            'preco',
            //'descricao',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
