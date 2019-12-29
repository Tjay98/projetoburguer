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



        <?php  if(Yii::$app->user->can('admin')){?>

                        <?= Html::a('Criar Categoria', ['create'], ['class' => 'btn btn-success']) ?>


        <?php }?>

            <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <br><br>
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
