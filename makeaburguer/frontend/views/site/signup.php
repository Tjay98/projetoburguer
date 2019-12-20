<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Registo';
?>
<div class="site-signup">
    <div class="container">
        <div class="card card-container">
            <div class="form-signin">
                <center> <h1><?= Html::encode($this->title) ?></h1><br><p>Preencha os campos para efetuar registo de uma conta:</p></center>
                <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                    <div class="col-lg-6">
                        <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Nome') ?>
                        <?= $form->field($model, 'email') ?>
                        <?= $form->field($model,'nif') ?>
                    </div>
                    <div class="col-lg-6">
                        <?= $form->field($model,'telemovel')->label('Telemóvel')?>
                        <?= $form->field($model, 'password')->passwordInput() ?>
                        <?= $form->field($model, 'password_repeat')->passwordInput()->label('Repetir a password') ?>

                    </div>
                <div class="form-group">
                    <?= Html::submitButton('Registo', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>

        </div>
    </div>
</div>
