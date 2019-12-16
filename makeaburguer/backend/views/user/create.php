<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = 'Criar Utilizador';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">
    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
            <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Nome') ?>
            <?= $form->field($model, 'email') ?>
            <?= $form->field($model,'nif') ?>
            <?= $form->field($model,'telemovel')->label('Telemóvel')?>
            <?= $form->field($model, 'password')->passwordInput() ?>
            <?= $form->field($model, 'password_repeat')->passwordInput()->label('Repetir a password') ?>

            <?= Html::submitButton('Criar conta', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>

        <?php ActiveForm::end(); ?>

</div>
