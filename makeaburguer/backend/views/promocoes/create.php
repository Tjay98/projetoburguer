<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Promocoes */

$this->title = 'Criar Promocão';
$this->params['breadcrumbs'][] = ['label' => 'Promocoes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="promocoes-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
