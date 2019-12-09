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


    <?Php if(Yii::$app->user->can('admin')){?>
    <p>
        <?= Html::a('Criar Hamburger', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php }?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nome',
            'preco',
            'descricao',
            'pao',
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
