<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([

        'brandLabel' => Html::img('@web/imagens/logo_makeaburguer1.png',['id'=>'logo']),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems[]=['label'=>'Produtos',
        'items'=>[
//                          '<li class="dropdown-header">Produtos</li>',
            ['label'=>'Hamburguers','url'=>['produtos/hamburguers']],
            '<li class="divider"></li>',
            ['label'=>'Acompanhamentos','url'=>['produtos/acompanhamentos']],
            '<li class="divider"></li>',
            ['label'=>'Bebidas','url'=>['produtos/bebidas']],
            '<li class="divider"></li>',
            ['label'=>'Sobremesas','url'=>['produtos/sobremesas']],

        ]
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => ' Registo', 'url' => ['/site/signup'],'linkOptions'=>['class'=>'glyphicon glyphicon-user'],];
        $menuItems[] = ['label' => ' Login', 'url' => ['/site/login'],'linkOptions'=>['class'=>'glyphicon glyphicon-log-in'],];
    } else {
        $menuItems[]=['label'=>' Pedido',
            'url'=>['produtos/pedido'],
//            'options'=> ['class'=>'glyphicon glyphicon-shopping-cart'],
            'linkOptions'=>['class'=>'glyphicon glyphicon-shopping-cart'],
        ];




        $menuItems[]=['label'=>' Perfil',
                    'linkOptions'=>['class'=>'glyphicon glyphicon-user'],
                    'items'=>[
                        ['label'=>'Ver Perfil','url'=>['cliente/info']],
                        '<li class="divider"></li>',
                        ['label'=>'Faturas','url'=>['cliente/faturas']],


                    ]
        ];
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton('<i class="glyphicon glyphicon-log-out"></i> Logout',

                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';

    }

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right nav-pills'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">Make A Burguer</p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
