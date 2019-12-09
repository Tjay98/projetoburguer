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

    <?= $form->field($model, 'pao')->dropDownList($getI,['prompt'=>'']) ?>

    <?= $form->field($model, 'molho')->dropDownList($getI,['prompt'=>'']) ?>

    <?= $form->field($model, 'carne')->dropDownList($getI,['prompt'=>'']) ?>

    <?= $form->field($model, 'vegetais')->dropDownList($getI,['prompt'=>'']) ?>

    <?= $form->field($model, 'queijo')->dropDownList($getI,['prompt'=>'']) ?>

    <?= $form->field($model, 'complemento')->dropDownList($getI,['prompt'=>'']) ?>



    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
