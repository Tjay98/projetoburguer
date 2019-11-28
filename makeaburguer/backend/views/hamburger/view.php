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



    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nome',
            'preco',
            'descricao',
            'ingrediente1',
            'ingrediente2',
            'ingrediente3',
            'ingrediente4',
            'ingrediente5',
            'ingrediente6',
            'ingrediente7',
            'ingrediente8',
            'ingrediente9',
            'ingrediente10',
            'ingrediente_extra1',
            'ingrediente_extra2',
            'ingrediente_extra3',
            'ingrediente_extra4',
            'ingrediente_extra5',
        ],
    ]) ?>

</div>
