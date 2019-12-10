<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\HamburgercSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hamburgercs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hamburgerc-index">

    <p>
        <?= Html::a('Create Hamburgerc', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'pao',
            'molho',
            'carne',
            'vegetais',
            //'queijo',
            //'complementos',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>