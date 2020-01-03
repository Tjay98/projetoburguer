<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\HamburgerC */

$this->title = 'Criar Hambúrguer Costumizado';
$this->params['breadcrumbs'][] = ['label' => 'Hambúrguers Costumizados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hamburguer-c-create">


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
