<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\HamburgercSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hamburger Cs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hamburger-c-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Hamburger C', ['create'], ['class' => 'btn btn-success']) ?>
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
