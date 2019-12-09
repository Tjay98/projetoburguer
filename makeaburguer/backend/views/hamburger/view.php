<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\Ingrediente;
/* @var $this yii\web\View */
/* @var $model app\models\Hamburger */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Hamburgers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="hamburger-view">


    <?Php if(Yii::$app->user->can('admin')){?>
        <p>
            <?= Html::a('Atualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Apagar', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Tem a certeza que deseja apagar o item selecionado? Se tiver um produto associado irá redirecionar para o mesmo',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
    <?php } ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nome',
            'preco',
            'descricao',
            'imagem',
            'pao',
            'molho',
            'carne',
            'vegetais',
            'queijo',
            'complemento'

        ],
    ]) ?>

</div>
