<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Menu */

$this->title = 'Criar Menu';
$this->params['breadcrumbs'][] = ['label' => 'Menus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-create">

    <?= $this->render('_form', [
        'model' => $model,
        'getH'=> $getH,
        'Bebida'=>$Bebida,
        'complemento'=>$complemento,
        'Sobremesa'=>$Sobremesa,
    ]) ?>

</div>
