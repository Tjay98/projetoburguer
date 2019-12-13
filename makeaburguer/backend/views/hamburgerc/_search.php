<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\HamburgercSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hamburger-c-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'pao') ?>

    <?= $form->field($model, 'molho') ?>

    <?= $form->field($model, 'carne') ?>

    <?= $form->field($model, 'vegetais') ?>

    <?php // echo $form->field($model, 'queijo') ?>

    <?php // echo $form->field($model, 'complementos') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
