<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model backend\models\PedidoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pedido-search">

<?php Pjax::begin(); ?>

<?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    
        <div class="col-lg-3 col-md-4">
        <?= $form->field($model, 'globalSearch')->label('')->textInput()->input('pesquisar',['placeholder'=>'Pesquisar']) ?>
        </div>
        <div class="col-lg-5 col-md-4">
            <br>
            
        
            <?= Html::submitButton('Pesquisar', ['class' => 'btn btn-primary']) ?>
        </div>                   
<?php ActiveForm::end(); ?>
<?php Pjax::end();?>

</div>
