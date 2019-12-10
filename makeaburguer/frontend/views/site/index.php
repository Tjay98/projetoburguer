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

                    <center><a href="#" id="imagem1"><?php echo Html::img('@web/hamburguers/hamburger_bacon.jpg')?></a></center>
                    <div class="carousel-caption">
                        <h4>Hamburguer de bacon</h4>
                        <p>Hamburguer suculento de carne de vaca com queijo, alface, tomate, bacon e cebola</p>
                    </div>
                </div>

                <div class="item">
                    <center><a href="#"><?php echo Html::img('@web/hamburguers/hamburger_double_cheese.jpg')?></a></center>
                    <div class="carousel-caption">
                        <h4>Double Cheese de bacon</h4>
                        <p>Hamburguer suculento com 2 hamburguers carne de vaca, com queijo, alface, tomate, bacon e cebola</p>
                    </div>
                </div>

                <div class="item">
                    <center><a href="#"><?php echo Html::img('@web/hamburguers/hamburger_simples.jpg')?></a></center>
                    <div class="carousel-caption">
                        <h4>Hamburguer simples</h4>
                        <p>Hamburguer com carne de vaca, queijo, tomate e alface</p>
                    </div>
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
