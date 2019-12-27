<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model backend\models\CategoriaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

    <div class="categoria-search">

            <?php Pjax::begin(); ?>
                <?php $form = ActiveForm::begin([
                    'action' => ['index'],
                    'method' => 'get',
                ]); ?>

                    <?= $form->field($model, 'globalSearch')->label('')->textInput()->input('pesquisar',['placeholder'=>'Pesquisar']) ?>

                <br>
                    <div class="form-group">
                        <?= Html::submitButton('Pesquisar', ['class' => 'btn btn-primary']) ?>
                    </div>

                <?php ActiveForm::end(); ?>
            <?php Pjax::end();?>

    </div>
