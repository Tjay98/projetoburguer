<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Categoria */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="categoria-form">
    
    <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>

    <?php ActiveForm::end(); ?>
   
</div>
