<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Hamburgerc */

$this->title = 'Update Hamburgerc: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Hamburgercs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hamburgerc-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
