<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pedido */

$this->title = 'Criar Pedido';
$this->params['breadcrumbs'][] = ['label' => 'Pedidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pedido-create">


    <?= $this->render('_form', [
        'model' => $model,
        'getM' => $getM,
        'getP'=>$getP,
        'getU' => $getU,
        'model2' => $model2,
        'getH'=>$getH,
        'bebida'=>$bebida,
        'complemento'=>$complemento,
        'sobremesa'=>$sobremesa,
        'produtos'=>$produtos,
    ]);?>


</div>
