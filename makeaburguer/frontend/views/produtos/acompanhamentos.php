<?php

/* @var $this yii\web\View */


use yii\bootstrap\Button;
use yii\bootstrap\Html;
use yii\web\View;
use yii\widgets\LinkPager;
use yii\widgets\Pjax;

$this->title = 'Acompanhamentos';
?>
<div class="site-index">

    <div class="jumbotron">
        <div class="col-lg-12">
            <?php Pjax::begin(); ?>
            <?php foreach ($acompanhamentos as $acompanhamento): ?>
                <div class="col-lg-4">
                    <div class="container" id="hamburguercontainer">
                        <h2><?= $acompanhamento->nome ?></h2>

                        <div><?php echo Html::img(Yii::$app->request->baseUrl.'/backend/web/'.$acompanhamento->imagem,['class'=>'imagemproduto'])?></div>
                        <hr>
                        <?= Html::a('Ver mais informação<br><p class="glyphicon glyphicon-search" style="color:white"></p>', 
                                    ['/produtos/infoprodutos','id'=>$acompanhamento->id], 
                                    ['class'=>'btn btn-primary grid-button']) ?>


                    </div>
                </div>

            <?php endforeach; ?>


        </div>
    </div>
    <?php  //fazer display de uma label para identificar páginas
    if ($contagem>3){
    echo "<h4>Páginas</h4>";
    }
    ?>
    <?= LinkPager::widget(['pagination' => $pagination]) ?>
    <?php Pjax::end(); ?>

</div>
