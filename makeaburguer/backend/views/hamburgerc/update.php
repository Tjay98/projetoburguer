<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\HamburgerC */

$this->title = 'Atualizar Hamburguer customizado ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Hamburger Cs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hamburger-c-update">

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
