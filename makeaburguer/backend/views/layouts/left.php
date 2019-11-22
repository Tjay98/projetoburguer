<aside class="main-sidebar">

    <section class="sidebar">
        <?php if(Yii::$app->user->can('admin')) { ?>
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user-icon-white.png" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <h4><?= \Yii::$app->user->identity->username ?></h4>


            </div>
        </div>

        <!-- search form -->
<!--        <form action="#" method="get" class="sidebar-form">-->
<!--            <div class="input-group">-->
<!--                <input type="text" name="q" class="form-control" placeholder="Search..."/>-->
<!--              <span class="input-group-btn">-->
<!--                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>-->
<!--                </button>-->
<!--              </span>-->
<!--            </div>-->
<!--        </form>-->
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Menu', 'options' => ['class' => 'header']],
                    ['label' => 'User', 'url' => ['user/index']],
                    ['label' => 'Hamburger', 'url' => ['hamburger/index']],
                    ['label' => 'Cliente', 'url' => ['cliente/index']],
                    ['label' => 'Ingrediente', 'url' => ['ingrediente/index']],
                    ['label' => 'Pedido', 'url' => ['pedido/index']],
                    ['label' => 'Produtos', 'url' => ['produtos/index']],
                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],

                ],
            ]
        ) ?>
        <?php } else{ ?>
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
    </section>

</aside>
