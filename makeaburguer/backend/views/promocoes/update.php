<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Promocoes */

$this->title = 'Atualizar Promoção: ' . $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Promocoes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="promocoes-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
