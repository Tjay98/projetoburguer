<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CategoriaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categorias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categoria-index">
    <div class="col-lg-12">

    <?php  if(Yii::$app->user->can('admin')){?>
                <br>
                    <?= Html::a('Criar Categoria', ['create'], ['class' => 'btn btn-success']) ?>


    <?php }?>

                <div class="searchbar">
                    <input class="search_input" type="text" name="" placeholder="Search...">
                    <a href="" class="search_icon"><i class="fa fa-search"></i></a>
                </div>

        <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nome',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
