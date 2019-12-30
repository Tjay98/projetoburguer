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

    <?php   $hoje = date('d-M-Y'); 
            $promocao='29-Dec-2019'; //colocar $promocao igual a um valor do finder
            $hojed=strtotime($hoje);
            $promocaod=strtotime($promocao);
            echo "Hoje em datetime:".$hojed;
            echo "<br>";
            echo "Data final da promoçao em datetime:".$promocaod;
            echo"<br>";
            if(($promocaod<$hojed) ){
                echo"A promoção expirou no dia:".$promocao;
            }
            /*elseif(($promocaod=$hojed)){
                echo"expiro";
            }*/
            else{
                echo"valiido";
            }
           /* if(strcmp($hoje,$promocao)==0){
                echo"Promoção acabou";
            }*/
                    
    ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nome',
            'valor',
            'data_inicio',
            'data_fim',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
