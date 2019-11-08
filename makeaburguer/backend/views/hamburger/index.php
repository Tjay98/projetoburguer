<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\HamburgerSearch */
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
            'preco',
            'descricao',
            'ingrediente1',
            //'ingrediente2',
            //'ingrediente3',
            //'ingrediente4',
            //'ingrediente5',
            //'ingrediente6',
            //'ingrediente7',
            //'ingrediente8',
            //'ingrediente9',
            //'ingrediente10',
            //'ingrediente_extra1',
            //'ingrediente_extra2',
            //'ingrediente_extra3',
            //'ingrediente_extra4',
            //'ingrediente_extra5',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
