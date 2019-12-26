<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProdutosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Produtos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produtos-index">

    <?Php if(Yii::$app->user->can('admin')){?>
    <p>
        <?= Html::a('Create Produtos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php }?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nome',
            'imagem',
            [
                'label'=>'imagem',
                'attribute'=>'imagem',
                'format'=>'html',
                'value'=>function($model){
                    return \yii\bootstrap\Html::img('@web/'.$model->imagem,['width'=>'50']);
                }
            ],
            'categoria',
            'preco',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
