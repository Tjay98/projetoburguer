<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Hamburger */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hamburger-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'imagem')->fileInput() ?>

    <?= $form->field($model, 'descricao')->textarea(['rows  ' => 6]) ?>

    <?= $form->field($model, 'pao')->dropDownList($pao,['prompt'=>'']) ?>

    <?= $form->field($model, 'molho')->dropDownList($molho,['prompt'=>'']) ?>

    <?= $form->field($model, 'carne')->dropDownList($carne,['prompt'=>'']) ?>

    <?= $form->field($model, 'vegetais')->dropDownList($vegetais,['prompt'=>'']) ?>

    <?= $form->field($model, 'queijo')->dropDownList($queijo,['prompt'=>'']) ?>

    <?= $form->field($model, 'complemento')->dropDownList($complemento,['prompt'=>'']) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
