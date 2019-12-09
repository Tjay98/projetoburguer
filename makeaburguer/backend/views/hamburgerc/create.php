<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Hamburgerc */

$this->title = 'Create Hamburgerc';
$this->params['breadcrumbs'][] = ['label' => 'Hamburgercs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hamburgerc-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
