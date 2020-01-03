<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Hamburger */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Hamburguers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="hamburguer-view">

   <?php if(Yii::$app->user->can('view-admin')) { ?>
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
        <tr><th>Nome</th><td><?php echo $model->nome?></td></tr>
        <tr><th>Caminho da Imagem</th><td><?php echo $model->imagem?></td></tr>
        <tr><th>Descrição do produto</th><td><?php echo $model->descricao?></td></tr>
        <tr><th>Tipo de Pão</th><td><?php echo $pao->nome;?></td></tr>
        <?php if(!empty($molho)){
            echo "<tr><th>Tipo de Molho</th><td>".$molho->nome."</td></tr>";
        }?>
        <tr><th>Tipo de Carne</th><td><?php echo $carne->nome;?></td></tr>
        <?php if(!empty($vegetais)){
            echo "<tr><th>Tipo de Vegetais</th><td>".$vegetais->nome."</td></tr>";
        }?>
        <?php if(!empty($queijo)){
            echo "<tr><th>Tipo de Queijo</th><td>".$queijo->nome."</td></tr>";
        }?>
        <?php if(!empty($complemente)){
            echo "<tr><th>Tipo de Complemento</th><td>".$complemente->nome."</td></tr>";
        }?>
        <tr><th>Preço</th><td><?php echo $model->preco?></td></tr>

    </tbody>
</table>
