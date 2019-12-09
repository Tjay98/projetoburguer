<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\HamburgerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hamburgers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hamburger-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Hamburger', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nome',
            'imagem',
            'descricao:ntext',
            'pao',
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
