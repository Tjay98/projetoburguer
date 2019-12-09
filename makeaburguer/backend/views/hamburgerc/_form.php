<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Hamburgerc */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hamburgerc-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'pao')->textInput() ?>

    <?= $form->field($model, 'molho')->textInput() ?>

    <?= $form->field($model, 'carne')->textInput() ?>

    <?= $form->field($model, 'vegetais')->textInput() ?>

    <?= $form->field($model, 'queijo')->textInput() ?>

    <?= $form->field($model, 'complementos')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
