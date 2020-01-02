<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Menu */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Menus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="menu-view">

    <?Php if(Yii::$app->user->can('admin')){?>
        <p>
            <?= Html::a('Atualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Apagar', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Tem a certeza que deseja apagar o item selecionado?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
    <?php }?>


</div>
<table class="table table-striped table-bordered detail-view">
    <tbody>
        <tr><th>ID</th><td><?php echo $model->id; ?></td></tr>
        <?php if(!empty($hamburger->nome)){
            echo "<tr><th>Hamburguer</th><td>".$hamburger->nome."</td></tr>";
        }?>
        <?php if(!empty($bebida->nome)){
            echo "<tr><th>Bebida</th><td>".$bebida->nome."</td></tr>";
        }?>
        <?php if(!empty($complemento->nome)){
            echo "<tr><th>Complemento</th><td>".$complemento->nome."</td></tr>";
        }?>
        <?php if(!empty($sobremesa->nome)){
            echo "<tr><th>Sobremesa</th><td>".$sobremesa->nome."</td></tr>";
        }?>
        <?php if(!empty($produtos->nome)){
            echo "<tr><th>Extra</th><td>".$produtos->nome."</td></tr>";
        }?>
        <tr><th>Preço</th><td><?php echo $model->preco?></td></tr>

    </tbody>
</table>
