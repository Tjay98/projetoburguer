<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Menu */

$this->title = 'Update Menu: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Menus', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="menu-update">



    <?= $this->render('_form', [
        'model' => $model,
        'getH' => $getH,
        'Bebida' => $Bebida,
        'Complemento' => $Complemento,
        'Sobremesa' => $Sobremesa,
        'extra' => $extra,
    ]) ?>

</div>
