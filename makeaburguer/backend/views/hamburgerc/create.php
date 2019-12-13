<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\HamburgerC */

$this->title = 'Criar Hamburger C';
$this->params['breadcrumbs'][] = ['label' => 'Hamburger Cs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hamburger-c-create">


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
