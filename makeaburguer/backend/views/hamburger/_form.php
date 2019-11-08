<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Hamburger */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hamburger-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'preco')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descricao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ingrediente1')->textInput() ?>

    <?= $form->field($model, 'ingrediente2')->textInput() ?>

    <?= $form->field($model, 'ingrediente3')->textInput() ?>

    <?= $form->field($model, 'ingrediente4')->textInput() ?>

    <?= $form->field($model, 'ingrediente5')->textInput() ?>

    <?= $form->field($model, 'ingrediente6')->textInput() ?>

    <?= $form->field($model, 'ingrediente7')->textInput() ?>

    <?= $form->field($model, 'ingrediente8')->textInput() ?>

    <?= $form->field($model, 'ingrediente9')->textInput() ?>

    <?= $form->field($model, 'ingrediente10')->textInput() ?>

    <?= $form->field($model, 'ingrediente_extra1')->textInput() ?>

    <?= $form->field($model, 'ingrediente_extra2')->textInput() ?>

    <?= $form->field($model, 'ingrediente_extra3')->textInput() ?>

    <?= $form->field($model, 'ingrediente_extra4')->textInput() ?>

    <?= $form->field($model, 'ingrediente_extra5')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
