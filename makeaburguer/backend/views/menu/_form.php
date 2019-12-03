<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Menu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_hamburger')->dropDownList($getH,['prompt'=>'']) ?>

    <?= $form->field($model, 'id_bebida')->dropDownList($Bebida,['prompt'=>'']) ?>

    <?= $form->field($model, 'id_complemento')->dropDownList($Complemento,['prompt'=>'']) ?>

    <?= $form->field($model, 'id_sobremesa')->dropDownList($Sobremesa,['prompt'=>'']) ?>

    <?= $form->field($model, 'id_extra')->dropDownList($extra,['prompt'=>'']) ?>

    <?= $form->field($model, 'preco')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descricao')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
