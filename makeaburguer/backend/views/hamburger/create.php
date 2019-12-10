<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Hamburger */

$this->title = 'Create Hamburger';
$this->params['breadcrumbs'][] = ['label' => 'Hamburgers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hamburger-create">


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
