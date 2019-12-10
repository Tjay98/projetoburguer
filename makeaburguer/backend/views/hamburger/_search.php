<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\HamburgerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hamburger-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nome') ?>

    <?= $form->field($model, 'imagem') ?>

    <?= $form->field($model, 'descricao') ?>

    <?= $form->field($model, 'pao') ?>

    <?php // echo $form->field($model, 'molho') ?>

    <?php // echo $form->field($model, 'carne') ?>

    <?php // echo $form->field($model, 'vegetais') ?>

    <?php // echo $form->field($model, 'queijo') ?>

    <?php // echo $form->field($model, 'complemento') ?>


    <div class="form-group">
        <?= Html::submitButton('Pesquisar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Limpar', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
