<?php

/* @var $this yii\web\View */


use yii\bootstrap\Button;
use yii\bootstrap\Html;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="container">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
<!--            <ol class="carousel-indicators">-->
<!--                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>-->
<!--                <li data-target="#myCarousel" data-slide-to="1"></li>-->
<!--                <li data-target="#myCarousel" data-slide-to="2"></li>-->
<!--            </ol>-->

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">

                    <center><a href="#" id="imagem1"><?php echo Html::img('@web/hamburgers/hamburger_bacon.jpg')?></a></center>
                    <div class="carousel-caption">
                        <h4>First Thumbnail label</h4>
                        <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    </div>
                </div>

                <div class="item">
                    <center><a href="#"><?php echo Html::img('@web/hamburgers/hamburger_double_cheese.jpg')?></a></center>
                </div>

                <div class="item">
                    <center><a href="#"><?php echo Html::img('@web/hamburgers/hamburger_simples.jpg')?></a></center>
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>


    <div class="body-content">



    </div>
</div>
