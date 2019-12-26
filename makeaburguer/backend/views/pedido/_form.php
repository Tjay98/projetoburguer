<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pedido */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pedido-form">

    <?php $form = ActiveForm::begin(); ?>

    <?=$form->field($model, 'user')->widget(Select2::classname(), [
        'data' => $getU,
        'language' => 'pt',
        'options' => ['placeholder' => 'Selecione o cliente'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);?>



    <?= $form->field($model, 'compra')->textInput(['maxlength' => true]) ?>

    <h3>Menus</h3>
    <?=$form->field($model2, 'id_hamburger')->widget(Select2::classname(), [
        'data' => $getH,
        'language' => 'pt',
        'options' => ['placeholder' => 'Selecione o Hamburguer'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);?>

    <?=$form->field($model2, 'id_bebida')->widget(Select2::classname(), [
        'data' => $bebida,
        'language' => 'pt',
        'options' => ['placeholder' => 'Selecione a bebida'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);?>
    <?=$form->field($model2, 'id_sobremesa')->widget(Select2::classname(), [
        'data' => $sobremesa,
        'language' => 'pt',
        'options' => ['placeholder' => 'Selecione a sobremesa'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);?>

    <?=$form->field($model2, 'id_complemento')->widget(Select2::classname(), [
        'data' => $complemento,
        'language' => 'pt',
        'options' => ['placeholder' => 'Selecione um complemento'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);?>






    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
