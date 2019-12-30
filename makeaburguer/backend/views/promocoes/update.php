<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Promocoes */

$this->title = 'Update Promocoes: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Promocoes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="promocoes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
