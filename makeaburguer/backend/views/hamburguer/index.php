<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\HamburgerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hambúrguers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hamburguer-index">
    <?Php if(Yii::$app->user->can('admin')){?>
    <p>
        <?= Html::a('Criar Hamburguer', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php }?>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>
    <br>
    <br>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nome',
            [
                'label'=>"Caminho da imagem",
                'attribute'=>'imagem',
            ],
            [
                    'label'=>'Imagem',
                    'attribute'=>'imagem',
                    'format'=>'html',
                    'value'=>function($model){
                        return yii\bootstrap\Html::img('@web/'.$model->imagem,['width'=>'50']);
                    }
            ],
            'descricao:ntext',
            //'pao',
            //'molho',
            //'carne',
            //'vegetais',
            //'queijo',
            //'complemento',
            //'extra',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
