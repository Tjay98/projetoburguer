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
        <div class="card"><center><H1 id="idperfil">Pedido</H1></center>

        

       <?php 
       $request = Yii::$app->request;
       if ($request->isPost) {?>
        <h3>Pedido Efetuado!</h3>
            <?php print_r($model2->id_hamburguer)?><br>
            
            <?php print_r($model2->id_bebida)?><br>
            <?php print_r($model2->id_complemento)?><br>
            <?php print_r($model2->id_sobremesa)?><br>
            <?php print_r($model2->id_extra)?><br>
            <?php var_dump($model2->preco)?><br>

       <?php } else{ ?>
            <?php $form = ActiveForm::begin([
            'options' => [
                'id' => 'pedidoform'
             ]
            ]); ?>

               
               <h2>Hambúrguers</h2>
           <?php foreach($hamburguers as $hamburguer){
                $list[$hamburguer->id]=Html::img(Yii::$app->request->baseUrl.'/backend/web/'.$hamburguer->imagem,['class'=>'imagemproduto']);

           }
           //RadioList permite selecionar apenas um dos ids, neste caso mostra a imagem e o que é selecionado é o id
           echo $form->field($model2, 'id_hamburguer')->radioList($list, ['encode' => false])->label(false) ?>
            

            <br>
            <h2>Bebidas</h2>
           <?php foreach($bebidas as $bebida){
                $list2[$bebida->id]=Html::img(Yii::$app->request->baseUrl.'/backend/web/'.$bebida->imagem,['class'=>'imagemproduto']);

           }
           //RadioList permite selecionar apenas um dos ids, neste caso mostra a imagem e o que é selecionado é o id
           echo $form->field($model2, 'id_bebida')->radioList($list2, ['encode' => false])->label(false) ?>
            
            <br>
            <h2>Complementos</h2>
           <?php foreach($complementos as $complemento){
                $list3[$complemento->id]=Html::img(Yii::$app->request->baseUrl.'/backend/web/'.$complemento->imagem,['class'=>'imagemproduto']);

           }
           //RadioList permite selecionar apenas um dos ids, neste caso mostra a imagem e o que é selecionado é o id
           echo $form->field($model2, 'id_complemento')->radioList($list3   , ['encode' => false])->label(false) ?>
            
            <br>
            <h2>Sobremesa</h2>
           <?php foreach($sobremesas as $sobremesa){
                $list4[$sobremesa->id]=Html::img(Yii::$app->request->baseUrl.'/backend/web/'.$sobremesa->imagem,['class'=>'imagemproduto']);

           }
           //RadioList permite selecionar apenas um dos ids, neste caso mostra a imagem e o que é selecionado é o id
           echo $form->field($model2, 'id_sobremesa')->radioList($list4   , ['encode' => false])->label(false) ?>

            
            <br>
            <h2>Adicione algo Extra ao seu Menu</h2>
           <?php foreach($extras as $extra){
                $list5[$extra->id]=Html::img(Yii::$app->request->baseUrl.'/backend/web/'.$extra->imagem,['class'=>'imagemproduto']);

           }
           //RadioList permite selecionar apenas um dos ids, neste caso mostra a imagem e o que é selecionado é o id
           echo $form->field($model2, 'id_extra')->radioList($list5   , ['encode' => false])->label(false) ?>
            
            
            <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
            
            <?php ActiveForm::end(); ?> 
           

       <?php } ?>

       


       

        
    </div>
        
</div>

