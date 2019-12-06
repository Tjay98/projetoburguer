<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\HamburgerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hamburger-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nome') ?>

    <?= $form->field($model, 'preco') ?>

    <?= $form->field($model, 'descricao') ?>

    <?= $form->field($model, 'ingrediente1') ?>

    <?php // echo $form->field($model, 'ingrediente2') ?>

    <?php // echo $form->field($model, 'ingrediente3') ?>

    <?php // echo $form->field($model, 'ingrediente4') ?>

    <?php // echo $form->field($model, 'ingrediente5') ?>

    <?php // echo $form->field($model, 'ingrediente6') ?>

    <?php // echo $form->field($model, 'ingrediente7') ?>

    <?php // echo $form->field($model, 'ingrediente8') ?>

    <?php // echo $form->field($model, 'ingrediente9') ?>

    <?php // echo $form->field($model, 'ingrediente10') ?>

    <?php // echo $form->field($model, 'ingrediente_extra1') ?>

    <?php // echo $form->field($model, 'ingrediente_extra2') ?>

    <?php // echo $form->field($model, 'ingrediente_extra3') ?>

    <?php // echo $form->field($model, 'ingrediente_extra4') ?>

    <?php // echo $form->field($model, 'ingrediente_extra5') ?>

    <div class="form-group">
        <?= Html::submitButton('Procurar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Limpar', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
