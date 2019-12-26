<?php

use kartik\select2\Select2;
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

    <?= $form->field($model, 'descricao')->textarea(['rows  ' => 6])->label('Descrição') ?>

    <?=$form->field($model, 'pao')->widget(Select2::classname(), [
            'data' => $pao,
            'language' => 'pt',
            'options' => ['placeholder' => 'Selecione o tipo de pão'],
            'pluginOptions' => [
            'allowClear' => true
    ],
    ]);?>


    <?=$form->field($model, 'carne')->widget(Select2::classname(), [
        'data' => $carne,
        'language' => 'pt',
        'options' => ['placeholder' => 'Selecione o tipo de carne'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);?>
    <?=$form->field($model, 'molho')->widget(Select2::classname(), [
        'data' => $molho,
        'language' => 'pt',
        'options' => ['placeholder' => 'Selecione o tipo de molho'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);?>

    <?=$form->field($model, 'vegetais')->widget(Select2::classname(), [
        'data' => $vegetais,
        'language' => 'pt',
        'options' => ['placeholder' => 'Selecione o tipo de vegetais'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);?>

    <?=$form->field($model, 'queijo')->widget(Select2::classname(), [
        'data' => $queijo,
        'language' => 'pt',
        'options' => ['placeholder' => 'Selecione o tipo de queijo'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);?>
    <?=$form->field($model, 'complemento')->widget(Select2::classname(), [
        'data' => $complemento,
        'language' => 'pt',
        'options' => ['placeholder' => 'Selecione o tipo de complemento'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
