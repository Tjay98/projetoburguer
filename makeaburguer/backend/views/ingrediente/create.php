<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ingrediente */

$this->title = 'Criar Ingrediente';
$this->params['breadcrumbs'][] = ['label' => 'Ingredientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ingrediente-create">



    <?= $this->render('_form', [
        'model' => $model,
        'tipo' => $tipo,
    ]) ?>

</div>
