<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Produtos */

$this->title = 'Atualizar Produtos: ' . $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Produtos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nome, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="produtos-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
