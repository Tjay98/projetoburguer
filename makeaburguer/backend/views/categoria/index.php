<?php

use yii\helpers\Html;
use yii\grid\GridView;

use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $searchModel backend\models\CategoriaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categorias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categoria-index">
    <div class="container">

        <div class="col-lg-12">
        <?php  if(Yii::$app->user->can('admin')){?>
            <div class="col-lg-3 col-md-4">
            <br>
                        <?= Html::a('Criar Categoria', ['create'], ['class' => 'btn btn-success']) ?>
            </div>

        <?php }?>

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
