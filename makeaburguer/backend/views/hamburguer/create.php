<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Hamburger */

$this->title = 'Criar Hambúrguer';
$this->params['breadcrumbs'][] = ['label' => 'Hamburguers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hamburguer-create">


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
