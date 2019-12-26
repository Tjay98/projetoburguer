<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Menu */

$this->title = 'Atualizar Menu: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Menus', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="menu-update">

    <?= $this->render('_form', [
        'model' => $model,
        'getH'=> $getH,
        'bebida'=>$bebida,
        'complemento'=>$complemento,
        'sobremesa'=>$sobremesa,
        'produtos'=>$produtos,

    ]) ?>

</div>
