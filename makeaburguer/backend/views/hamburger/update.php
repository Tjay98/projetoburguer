<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Hamburger */

$this->title = 'Update Hamburger: ' . $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Hamburgers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nome, 'url' => ['view', 'nome' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hamburger-update">


    <?= $this->render('_form', [
        'model' => $model,
        'pao'=>$pao,
        'molho'=>$molho,
        'carne'=>$carne,
        'vegetais'=>$vegetais,
        'queijo'=>$queijo,
        'complemento'=>$complemento,
    ]) ?>

</div>
