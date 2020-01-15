<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PromocoesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Promoções';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="promocoes-index">

    <p>
        <?= Html::a('Criar Promoção', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nome',
            'valor',
            'data_inicio:date',
            'data_fim:date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
