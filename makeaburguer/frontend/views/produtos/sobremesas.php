<?php

/* @var $this yii\web\View */


use yii\bootstrap\Button;
use yii\bootstrap\Html;
use yii\web\View;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <div class="col-lg-12">
            <?php foreach ($sobremesas as $sobremesa): ?>
                <div class="col-lg-4">
                    <div class="container" id="hamburguercontainer">
                        <h2><?= $sobremesa->nome ?></h2>

                        <div><?php echo Html::img(Yii::$app->request->baseUrl.'/backend/web/'.$sobremesa->imagem)?></div>
                        <hr>
                        <h4>Ver Bebida:</h4>

                    </div>
                </div>

            <?php endforeach; ?>


        </div>





    </div>

    <div class="body-content">



    </div>
</div>