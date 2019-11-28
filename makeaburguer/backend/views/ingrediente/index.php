<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\IngredienteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ingredientes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ingrediente-index">

    <?Php if(Yii::$app->user->can('admin')){?>
    <p>
        <?= Html::a('Criar Ingrediente', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php }?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nome',
            'descricao',
            'preco',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
