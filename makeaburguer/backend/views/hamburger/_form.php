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

    <?= $form->field($model, 'imagem')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descricao')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'pao')->textInput() ?>

    <?= $form->field($model, 'molho')->textInput() ?>

    <?= $form->field($model, 'carne')->textInput() ?>

    <?= $form->field($model, 'vegetais')->textInput() ?>

    <?= $form->field($model, 'queijo')->textInput() ?>

    <?= $form->field($model, 'complemento')->textInput() ?>
    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
