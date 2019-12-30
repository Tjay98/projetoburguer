<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\Promocoes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="promocoes-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="col-lg-12">
        <div class="col-lg-4 col-md-4">
            <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-4 col-md-4">
            <?=$form->field($model,'valor', [
                                'options' => [
                                    'tag' => 'div',
                                    'class' => '',
                                ],])->textInput(['type' => 'number'])->label()?>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="col-lg-4 col-md-4">
            <?= $form->field($model, 'data_inicio')->widget(DatePicker::className(), [
                'inline' => false, 
                'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'dd-M-yyyy'
                ]
            ]);?>
        </div>
        <div class="col-lg-4 col-md-4">
            <?= $form->field($model, 'data_fim')->widget(DatePicker::className(), [
                'inline' => false, 
                'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'dd-M-yyyy'
                ]
            ]);?>
        </div>

    </div>
    <div class="col-lg-12">
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
