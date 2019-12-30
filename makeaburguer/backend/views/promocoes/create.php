<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Promocoes */

$this->title = 'Create Promocoes';
$this->params['breadcrumbs'][] = ['label' => 'Promocoes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="promocoes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
