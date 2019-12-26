<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Hamburger */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Hamburgers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="hamburger-view">


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

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nome',
            'imagem',
            'descricao:ntext',
            'pao',
            'molho',
            'carne',
            'vegetais',
            'queijo',
            'complemento',
            'preco',
        ],
    ]) ?>

<?php
foreach ($pao as $pae) {
    echo $model->id;
    echo "<br>";
    echo $model->nome;
    echo "<br>";
    echo $model->imagem;
    echo "<br>";
    echo $pae->tipo;
    echo "<br>";
    echo $model->id;
    echo "<br>";
    echo $model->id;
}


?>

</div>
