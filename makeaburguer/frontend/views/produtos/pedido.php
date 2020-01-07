<?php

/* @var $this yii\web\View */


use yii\bootstrap\Button;
use yii\bootstrap\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

$this->title = 'Pedido';
?>
<div class="site-index">

    <div class="jumbotron">
        <div class="col-lg-12">
        <div class="card" style="width: 100rem;"><center><H1 id="idperfil">Pedido</H1></center>
            <div class="card-body">
        </div>

       <?php 
       $request = Yii::$app->request;
       if ($request->isPost) {?>
        <h3>Pedido Efetuado!</h3>
        


       <?php } else{ ?>
        <?php $form = ActiveForm::begin(); ?>

               <br>
           <?php foreach($hamburguers as $hamburguer){
                $list[]=Html::img(Yii::$app->request->baseUrl.'/backend/web/'.$hamburguer->imagem,['class'=>'imagemproduto']);
                


           } echo $form->field($model2, 'id_hamburguer')->radioList($list, ['encode' => false])->label(false) ?>
           

           </div>

       <?php } ?>

       
        <?php ActiveForm::end(); ?>

        
    </div>
            </div>
        </div>
        
</div>
