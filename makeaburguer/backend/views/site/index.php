<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
$this->title = 'Make a burger';
?>

<div class="col-lg-12 col-xs-6">
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-red">
            <div class="inner">
                <h3><?= $Hamburger ?> </h3>
                <p>Hamburguers</p>
            </div>
            <div class="icon">
                <i class="fa fa-user""></i>
            </div>
            <a> <?= Html::a('More info', ['hamburger/index'], ['class' => 'small-box-footer']) ?></a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-blue">
            <div class="inner">
                <h3><?= $Cliente ?></h3>
                <p>Clientes</p>
            </div>
            <div class="icon">
                <i class="fa fa-user""></i>
            </div>
            <a> <?= Html::a('More info', ['cliente/index'], ['class' => 'small-box-footer']) ?></a>
        </div>
    </div>

</div>



<div class="site-index">

    <div class="jumbotron"><h1>Bem vindo <?= \Yii::$app->user->identity->username ?>!</h1></div>
</div>