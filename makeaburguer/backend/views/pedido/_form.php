<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Cliente;
use dosamigos\datetimepicker\DateTimePicker;


/* @var $this yii\web\View */
/* @var $model app\models\Pedido */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pedido-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_cliente')->dropDownList($getC,['prompt'=>'']) ?>

    <?= $form->field($model, 'id_menu')->dropDownList($getM,['prompt'=>'']) ?>

    <?= $form->field($model, 'preco')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data')->widget(DateTimePicker::className(), [
        'model' => $model,
        'attribute' => 'data',
        'language' => 'pt',
        'size' => 'ms',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'dd MM yyyy - HH:ii P',
            'todayBtn' => true
        ]
    ]);?>

    <?= $form->field($model, 'compra')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
