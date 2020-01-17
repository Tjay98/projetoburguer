<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\HamburgerC */

$this->title = 'Atualizar Hambúrguer costumizado ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Hamburguer Cs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="hamburger-c-update">

    <?= $this->render('_form', [
        'model' => $model,
        'getU' => $getU,
        'pao'=>$pao,
        'molho'=>$molho,
        'carne'=>$carne,
        'vegetais'=>$vegetais,
        'queijo'=>$queijo,
        'complemento'=>$complemento,
    ]) ?>

</div>
