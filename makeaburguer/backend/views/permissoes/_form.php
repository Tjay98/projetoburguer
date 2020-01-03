<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\AuthAssignment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auth-assignment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?=$form->field($model, 'item_name')->widget(Select2::classname(), [
        'data' => $role,//['admin','funcionario','utilizador'],
        'language' => 'pt',
        'options' => ['placeholder' => 'Selecione a permissão..'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);?>

    <?=$form->field($model, 'user_id')->widget(Select2::classname(), [
        'data' => $utilizador,
        'language' => 'pt',
        'options' => ['placeholder' => 'Selecione o utilizador..'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
