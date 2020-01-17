<?php use yii\helpers\Html;

use yii\helpers\Url;
?>
<aside class="main-sidebar">

    <section class="sidebar">
        <?php if((Yii::$app->user->can('admin'))||(Yii::$app->user->can('funcionario'))) { ?>
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
            <?php echo Html::img('@web/imagens/user-icon-white.png') ?>
                
            </div>
            <div class="pull-left info">
                <h4><?= \Yii::$app->user->identity->username ?></h4>

            </div>
        </div>
            <?php }else{ ?>
            <div class="user-panel">
                <div class="pull-left image">
                    <?php echo Html::img('@web/imagens/user-icon-white.png"') ?>
                </div>
                <div class="pull-left info">
                    <h4>Guest</h4>


                </div>
            </div>
            <?= dmstr\widgets\Menu::widget(
                [
                    'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                    'items' => [

                        ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],

                    ],
                ]
            ) ?>
        <?php }?>

        <?php if (Yii::$app->user->can('admin')){?>
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Menu', 'options' => ['class' => 'header']],
                    ['label' => 'User', 'url' => ['user/index']],
                    ['label' => 'Permissões', 'url' => ['permissoes/index']],
                    ['label' => 'Hamburguer', 'url' => ['hamburguer/index']],
                    ['label' => 'Hamburguer costumizado', 'url' => ['hamburguerc/index']],
                    ['label' => 'Promoções', 'url' => ['promocoes/index']],
                    ['label' => 'Categoria', 'url' => ['categoria/index']],
                    ['label' => 'Ingrediente', 'url' => ['ingrediente/index']],
                    ['label' => 'Produtos', 'url' => ['produtos/index']],
                    ['label' => 'Pedidos', 'url' => ['pedido/index']],
                    ['label' => 'Menus', 'url' => ['menu/index']],
                

                ],
            ]
        ) ?>
        <?php }elseif(Yii::$app->user->can('funcionario')){?>
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Menu', 'options' => ['class' => 'header']],
                    ['label' => 'Hamburguer', 'url' => ['hamburguer/index']],
                    ['label' => 'Categoria', 'url' => ['categoria/index']],
                    ['label' => 'Ingrediente', 'url' => ['ingrediente/index']],
                    ['label' => 'Produtos', 'url' => ['produtos/index']],
                    ['label' => 'Pedidos', 'url' => ['pedido/index']],
                    ['label' => 'Menus', 'url' => ['menu/index']],

                ],
            ]
        ) ?>
        <?php }?>


    </section>

</aside>
