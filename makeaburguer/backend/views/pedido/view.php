<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pedido */

$this->title = $model->id."-".$user->username;
$this->params['breadcrumbs'][] = ['label' => 'Pedidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pedido-view">


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
        <tr><th>Id do pedido</th><td><?php echo $model->id; ?></td></tr>
        <tr><th>Id do Utilizador</th><td><?php echo $model->id_user?></td></tr>
        <tr><th>Nome do Utilizador</th><td><?php echo $user->username?></td></tr>
        <tr><th>Id do Menu</th><td><?php echo $model->id_menu?></td></tr>
        <tr><th>Data de compra</th><td><?php echo $model->data?></td></tr>
        <tr><th>Preço</th><td><?php echo $model->preco?>€</td></tr>
       
        

    </tbody>
</table>
