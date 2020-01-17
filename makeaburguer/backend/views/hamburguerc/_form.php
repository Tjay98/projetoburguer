<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\HamburgerC */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hamburguer-c-form">

    <?php $form = ActiveForm::begin(); ?>

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
    <?=$form->field($model, 'complementos')->widget(Select2::classname(), [
        'data' => $complemento,
        'language' => 'pt',
        'options' => ['placeholder' => 'Selecione o tipo de complemento'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);?>


    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
