<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Ingrediente;
/* @var $this yii\web\View */
/* @var $model app\models\Hamburger */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hamburger-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'preco')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descricao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ingrediente1')->dropDownList($getI,['prompt'=>'']) ?>

    <?= $form->field($model, 'ingrediente2')->dropDownList($getI,['prompt'=>'']) ?>

    <?= $form->field($model, 'ingrediente3')->dropDownList($getI,['prompt'=>'']) ?>

    <?= $form->field($model, 'ingrediente4')->dropDownList($getI,['prompt'=>'']) ?>

    <?= $form->field($model, 'ingrediente5')->dropDownList($getI,['prompt'=>'']) ?>

    <?= $form->field($model, 'ingrediente6')->dropDownList($getI,['prompt'=>'']) ?>

    <?= $form->field($model, 'ingrediente7')->dropDownList($getI,['prompt'=>'']) ?>

    <?= $form->field($model, 'ingrediente8')->dropDownList($getI,['prompt'=>'']) ?>

    <?= $form->field($model, 'ingrediente9')->dropDownList($getI,['prompt'=>'']) ?>

    <?= $form->field($model, 'ingrediente10')->dropDownList($getI,['prompt'=>'']) ?>

    <?= $form->field($model, 'ingrediente_extra1')->dropDownList($getI,['prompt'=>'']) ?>

    <?= $form->field($model, 'ingrediente_extra2')->dropDownList($getI,['prompt'=>'']) ?>

    <?= $form->field($model, 'ingrediente_extra3')->dropDownList($getI,['prompt'=>'']) ?>

    <?= $form->field($model, 'ingrediente_extra4')->dropDownList($getI,['prompt'=>'']) ?>

    <?= $form->field($model, 'ingrediente_extra5')->dropDownList($getI,['prompt'=>'']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
