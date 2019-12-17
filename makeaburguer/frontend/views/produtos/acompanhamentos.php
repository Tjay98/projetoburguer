<?php

/* @var $this yii\web\View */


use yii\bootstrap\Button;
use yii\bootstrap\Html;
use yii\web\View;
use yii\widgets\LinkPager;
use yii\widgets\Pjax;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <div class="col-lg-12">
            <?php Pjax::begin(); ?>
            <?php foreach ($acompanhamentos as $acompanhamento): ?>
                <div class="col-lg-4">
                    <div class="container" id="hamburguercontainer">
                        <h2><?= $acompanhamento->nome ?></h2>

                        <div><?php echo Html::img(Yii::$app->request->baseUrl.'/backend/web/'.$acompanhamento->imagem)?></div>
                        <hr>
                        <h4>Ver Acompanhamento:</h4>

                    </div>
                </div>

            <?php endforeach; ?>


        </div>
    </div>
    <?= LinkPager::widget(['pagination' => $pagination]) ?>
    <?php Pjax::end(); ?>

</div>
