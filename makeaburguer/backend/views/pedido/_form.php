<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datetimepicker\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Pedido */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pedido-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_user')->dropDownList($getU,['prompt'=>'']) ?>

    <?= $form->field($model, 'id_menu')->dropDownList($getM,['prompt'=>'']) ?>

    <?= $form->field($model, 'preco')->textInput(['maxlength' => true]) ?>

<!--    <?//= $form->field($model, 'data')->textInput(['maxlength' => true]) ?>-->

    <?= $form->field($model, 'compra')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
