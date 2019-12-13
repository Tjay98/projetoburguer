<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\HamburgerC */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hamburger-c-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pao')->dropDownList($pao,['prompt'=>'']) ?>

    <?= $form->field($model, 'molho')->dropDownList($molho,['prompt'=>'']) ?>

    <?= $form->field($model, 'carne')->dropDownList($carne,['prompt'=>'']) ?>

    <?= $form->field($model, 'vegetais')->dropDownList($vegetais,['prompt'=>'']) ?>

    <?= $form->field($model, 'queijo')->dropDownList($queijo,['prompt'=>'']) ?>

    <?= $form->field($model, 'complementos')->dropDownList($complemento,['prompt'=>'']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
