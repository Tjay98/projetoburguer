<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
$this->title = 'Make a burger';
?>

<div class="col-lg-12 col-xs-6">
    <div class="col-lg-2 col-xs-6">
        <div class="small-box bg-red">
            <div class="inner">
                <h3><?= $Hamburger ?> </h3>
                <p>Hamburguers</p>
            </div>
<!--            <div class="icon">-->
<!--                <i class="fa fa-user""></i>-->
<!--            </div>-->
            <a> <?= Html::a('Redirect', ['hamburger/index'], ['class' => 'small-box-footer']) ?></a>
        </div>
    </div>
    <div class="col-lg-2 col-xs-6">
        <div class="small-box bg-green">
            <div class="inner">
                <h3><?= $Produtos ?></h3>
                <p>Produtos</p>
            </div>
<!--            <div class="icon">-->
<!--                <i class="fa fa-user""></i>-->
<!--            </div>-->
            <a> <?= Html::a('Redirect', ['produtos/index'], ['class' => 'small-box-footer']) ?></a>
        </div>
    </div>
    <div class="col-lg-2 col-xs-6">
        <div class="small-box bg-purple">
            <div class="inner">
                <h3><?= $Ingredientes ?></h3>
                <p>Ingredientes</p>
            </div>
<!--            <div class="icon">-->
<!--                <i class="fa fa-user""></i>-->
<!--            </div>-->
            <a> <?= Html::a('Redirect', ['ingrediente/index'], ['class' => 'small-box-footer']) ?></a>
        </div>
    </div>
    <div class="col-lg-2 col-xs-6">
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3><?= $Pedidos ?></h3>
                <p>Pedidos</p>
            </div>
<!--            <div class="icon">-->
<!--                <i class="fa fa-user""></i>-->
<!--            </div>-->
            <a> <?= Html::a('Redirect', ['pedido/index'], ['class' => 'small-box-footer']) ?></a>
        </div>
    </div>
    <div class="col-lg-2 col-xs-6">
        <div class="small-box bg-orange">
            <div class="inner">
                <h3><?= $Menu ?></h3>
                <p>Menu</p>
            </div>
            <!--            <div class="icon">-->
            <!--                <i class="fa fa-user""></i>-->
            <!--            </div>-->
            <a> <?= Html::a('Redirect', ['menu/index'], ['class' => 'small-box-footer']) ?></a>
        </div>
    </div>
    <?php if(Yii::$app->user->can('admin')) {?>
    <div class="col-lg-2 col-xs-6">
        <div class="small-box bg-blue">
            <div class="inner">
                <h3><?= $Cliente ?></h3>
                <p>Clientes</p>
            </div>
            <div class="icon">
                <i class="fa fa-user""></i>
            </div>
            <a> <?= Html::a('Redirect', ['cliente/index'], ['class' => 'small-box-footer']) ?></a>
        </div>
    </div>
    <?php }?>

</div>



<div class="site-index">

    <div class="jumbotron"><h1>Bem vindo <?= \Yii::$app->user->identity->username ?>!</h1></div>
</div>