<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Hamburger */

$this->title = 'Create Hamburger';
$this->params['breadcrumbs'][] = ['label' => 'Hamburgers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hamburger-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
