<aside class="main-sidebar">

    <section class="sidebar">
        <?php if((Yii::$app->user->can('admin'))||(Yii::$app->user->can('funcionario'))) { ?>
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user-icon-white.png" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <h4><?= \Yii::$app->user->identity->username ?></h4>

            </div>
        </div>
            <?php }else{ ?>
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?= $directoryAsset ?>/img/user-icon-white.png" class="img-circle" alt="User Image"/>
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
                    ['label' => 'Hamburger', 'url' => ['hamburger/index']],
                    ['label' => 'Hamburger costumizado', 'url' => ['hamburgerc/index']],
                    ['label' => 'Categoria', 'url' => ['categoria/index']],
                    ['label' => 'Ingrediente', 'url' => ['ingrediente/index']],
                    ['label' => 'Produtos', 'url' => ['produtos/index']],
                    ['label' => 'Pedido', 'url' => ['pedido/index']],
                    ['label' => 'Menus', 'url' => ['menu/index']],
                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],

                ],
            ]
        ) ?>
        <?php }elseif(Yii::$app->user->can('funcionario')){?>
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Menu', 'options' => ['class' => 'header']],
                    ['label' => 'Hamburger', 'url' => ['hamburger/index']],
                    ['label' => 'Ingrediente', 'url' => ['ingrediente/index']],
                    ['label' => 'Produtos', 'url' => ['produtos/index']],
                    ['label' => 'Pedido', 'url' => ['pedido/index']],
                    ['label' => 'Menus', 'url' => ['menu/index']],



                ],
            ]
        ) ?>
        <?php }?>


    </section>

</aside>
