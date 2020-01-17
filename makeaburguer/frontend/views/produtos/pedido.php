<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
<?php

/* @var $this yii\web\View */


use yii\bootstrap\Button;
use yii\bootstrap\Html;
use yii\web\View;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

$this->title = 'Pedido';
?>
<div class="site-index">

    <div class="jumbotron">
        <center><H1>Pedido</H1></center>
        <hr>

        
     
       <?php 
       if (isset($_GET['id'])) {?>
        <h3>Pedido Efetuado!</h3>
        <?= Html::a('Criar outro pedido', ['/produtos/pedido'], ['class'=>'btn btn-primary grid-button']) ?>
        <?= Html::a('Ver as suas faturas', ['/cliente/faturas'], ['class'=>'btn btn-primary grid-button']) ?>

       <?php } else{ ?>
       <div id="selecionar">
       <button class="btn btn-primary" id="hamburguer_costumizado">Criar pedido com hambúrguer costumizado</button>
       <button class="btn btn-primary" id="hamburguer_casa">Criar pedido com hambúrguers da casa</button>
       </div>
       <button class="btn btn-primary" id="voltar">Voltar à seleção de tipo</button> 
       <hr>
          
       <div id="tipo_pedido">
          <button class="btn btn-primary" id="criarcostumizado"> Seu hambúrguer</button>
          <button class="btn btn-primary" id="verhamburguers"> Ver Hambúrguers</button>
          <button class="btn btn-primary" id="verbebidas"> Ver Bebidas</button>
          <button class="btn btn-primary" id="vercomplementos"> Ver Acompanhamentos</button>
          <button class="btn btn-primary" id="versobremesas"> Ver Sobremesas</button>
          <button class="btn btn-primary" id="verextras"> Ver Extras</button>
          <hr>
          <!--<button class="btn btn-primary" data-toggle="modal" data-target="#modalpedido"> Ver pedido </button>
          <hr> -->
            <?php $form = ActiveForm::begin([
            'options' => [
                'id' => 'pedidoform'
             ]
            ]); ?>

          <div id="hamburguerC">
               <?=$form->field($model3, 'pao')->widget(Select2::classname(), [
                    'data' => $pao,
                    'language' => 'pt',
                    'options' => ['placeholder' => 'Selecione o tipo de pão'],
                    'pluginOptions' => [
                         'allowClear' => true
               ],
               ]);?>


               <?=$form->field($model3, 'carne')->widget(Select2::classname(), [
                    'data' => $carne,
                    'language' => 'pt',
                    'options' => ['placeholder' => 'Selecione o tipo de carne'],
                    'pluginOptions' => [
                         'allowClear' => true
                    ],
               ]);?>
               <?=$form->field($model3, 'molho')->widget(Select2::classname(), [
                    'data' => $molho,
                    'language' => 'pt',
                    'options' => ['placeholder' => 'Selecione o tipo de molho'],
                    'pluginOptions' => [
                         'allowClear' => true
                    ],
               ]);?>

               <?=$form->field($model3, 'vegetais')->widget(Select2::classname(), [
                    'data' => $vegetais,
                    'language' => 'pt',
                    'options' => ['placeholder' => 'Selecione o tipo de vegetais'],
                    'pluginOptions' => [
                         'allowClear' => true
                    ],
               ]);?>

               <?=$form->field($model3, 'queijo')->widget(Select2::classname(), [
                    'data' => $queijo,
                    'language' => 'pt',
                    'options' => ['placeholder' => 'Selecione o tipo de queijo'],
                    'pluginOptions' => [
                         'allowClear' => true
                    ],
               ]);?>
               <?=$form->field($model3, 'complementos')->widget(Select2::classname(), [
                    'data' => $complementosing,
                    'language' => 'pt',
                    'options' => ['placeholder' => 'Selecione o tipo de complemento'],
                    'pluginOptions' => [
                         'allowClear' => true
                    ],
               ]);?>
          </div>
               
          <?php echo '<div id="hamburguers">'; ?>
          
               <h2>Hambúrguers</h2>
               
               <?php foreach($hamburguers as $hamburguer){
                    //declarar variaveis para colocar dentro da lista para a radiolist
                    $nomeH='<p class="card-text" style="color:white; font-size:15px ">'.$hamburguer->nome.'</p>';
                    $precoH='<p class="card-text" style="color:white; font-size:15px">Preço:'.$hamburguer->preco.'€</p>';
                    $cardIn='<div class="card" id="pedidocard"style="width: 25rem">';
                    $cardbod='<div class="card-body" style="width:20rem">';
                    $cardend='</div>';
                    $list[$hamburguer->id]=Html::img(Yii::$app->request->baseUrl.'/backend/web/'.$hamburguer->imagem,['class'=>'imagemproduto']).$cardIn.$cardbod.$nomeH.$precoH.$cardend.$cardend;

               }
               
               
               //RadioList permite selecionar apenas um dos ids, neste caso mostra a imagem e o que é selecionado é o id
               //Radiolist hamburguer
               echo $form->field($model2, 'id_hamburguer')->radioList($list, [
                    'encode' => false,
                    'id' => 'id_hamburguer'
                    ])->label(false) ?>

          <?php echo'</div>'; ?>

            <br>
          <?php echo '<div id="bebidas">'; ?>  
               <h2>Bebidas</h2>
               <?php foreach($bebidas as $bebida){
                    $nomeB='<p class="card-text" style="color:white; font-size:15px ">'.$bebida->nome.'</p>';
                    $precoB='<p class="card-text" style="color:white; font-size:15px ">Preço:'.$bebida->preco.'</p>';
                    $list2[$bebida->id]=Html::img(Yii::$app->request->baseUrl.'/backend/web/'.$bebida->imagem,['class'=>'imagemproduto']).$cardIn.$cardbod.$nomeB.$precoB.$cardend.$cardend;

               }
               //RadioList bebidas
               echo $form->field($model2, 'id_bebida')->radioList($list2, [
                    'encode' => false,
                    'id'=>'id_bebida',
                    ])->label(false) ?>
          <?php echo'</div>';?>

            <br>
          <?php echo '<div id="complementos">'; ?>
               <h2>Acompanhamentos</h2>
               <?php foreach($complementos as $complemento){
                    $nomec='<p class="card-text" style="color:white; font-size:15px ">'.$complemento->nome.'</p>';
                    $precoc='<p class="card-text" style="color:white; font-size:15px ">Preço:'.$complemento->preco.'</p>';
                    $list3[$complemento->id]=Html::img(Yii::$app->request->baseUrl.'/backend/web/'.$complemento->imagem,['class'=>'imagemproduto']).$cardIn.$cardbod.$nomec.$precoc.$cardend.$cardend;
               }
               //RadioList permite selecionar apenas um dos ids, neste caso mostra a imagem e o que é selecionado é o id
               echo $form->field($model2, 'id_complemento')->radioList($list3   , [
                    'encode' => false,
                    'id'=>'id_complemento',
                    ])->label(false) ?>
          <?php echo '</div>'; ?>

            <br>
          <?php echo '<div id="sobremesas">'; ?>
               <h2>Sobremesa</h2>
               <?php foreach($sobremesas as $sobremesa){
                    $nomeS='<p class="card-text" style="color:white; font-size:15px ">'.$sobremesa->nome.'</p>';
                    $precoS='<p class="card-text" style="color:white; font-size:15px ">Preço:'.$sobremesa->preco.'</p>';
                    $list4[$sobremesa->id]=Html::img(Yii::$app->request->baseUrl.'/backend/web/'.$sobremesa->imagem,['class'=>'imagemproduto']).$cardIn.$cardbod.$nomeS.$precoS.$cardend.$cardend;
               }
               //RadioList permite selecionar apenas um dos ids, neste caso mostra a imagem e o que é selecionado é o id
               echo $form->field($model2, 'id_sobremesa')->radioList($list4   , [
                    'encode' => false,
                    'id'=>'id_sobremesa',
                    ])->label(false) ?>
          <?php echo '</div>'; ?>
            
            <br>
          
          <?php echo '<div id="extras">'; ?>
               <h2>Adicione algo Extra ao seu Menu</h2>
               <?php foreach($extras as $extra){
                   $nomeE='<p class="card-text" style="color:white; font-size:15px ">'.$extra->nome.'</p>';
                   $precoE='<p class="card-text" style="color:white; font-size:15px ">Preço:'.$extra->preco.'</p>';
                   $list5[$extra->id]=Html::img(Yii::$app->request->baseUrl.'/backend/web/'.$extra->imagem,['class'=>'imagemproduto']).$cardIn.$cardbod.$nomeE.$precoE.$cardend.$cardend;
               }
               //RadioList permite selecionar apenas um dos ids, neste caso mostra a imagem e o que é selecionado é o id
               echo $form->field($model2, 'id_extra')->radioList($list5   , [
                    'encode' => false,
                    'id'=>'id_extra',
                    ])->label(false) ?>
          <?php echo '</div>'; ?>     
            <hr>
            <?=$form->field($model, 'promocao')->widget(Select2::classname(), [
                    'data' => $promocoes,
                    'language' => 'pt',
                    'options' => ['placeholder' => 'Selecione a promoção'],
                    'pluginOptions' => [
                         'allowClear' => true
               ],
               ]);?>
            <?= Html::submitButton('Efetuar Pedido', ['class' => 'btn btn-primary']) ?>




          <?php ActiveForm::end(); ?> 
         </div>  
          
       <?php } ?>

       


       

        

        
     </div>
</div>
<script>
     //ao carregar coloca as div invisiveis
     $( document ).ready(function() {
     $('#tipo_pedido').hide();
     $('#hamburguerC').hide();
     $('#hamburguers').hide();
     $('#bebidas').hide();
     $('#complementos').hide();
     $('#sobremesas').hide();
     $('#extras').hide();
     $('#voltar').hide();
     });
     //ao selecionar o hamburguer costumizado mostra a criaçao de pedido e permite criar o seu proprio hamburguer
     $("#hamburguer_costumizado").click(function() {
          $('#selecionar').hide();
          $('#tipo_pedido').show();
          $('#verhamburguers').hide();
          $('#voltar').show();
          
          

     });
     //faz o contrario do superior e mostra os hamburguers da casa
     $("#hamburguer_casa").click(function() {
          $('#selecionar').hide();
          $('#tipo_pedido').show();
          $('#criarcostumizado').hide();
          $('#voltar').show();

     });
     $("#voltar").click(function() {
          $('#selecionar').show();
          $('#tipo_pedido').hide();
          $('#voltar').hide();

     });
     $('#criarcostumizado').click(function(){
          if($('#hamburguerC').is(':visible')){
               $('#hamburguerC').hide();

          }
          else{
               $('#hamburguerC').show();
          }
     });
     //ao clicar ver hamburguer
     $("#verhamburguers").click(function() {
          if($('#hamburguers').is(':visible')){
               $('#hamburguers').hide();

          }
          else{
               $('#hamburguers').show();
          }
     });
     //ao clicar ver bebidas hide ou show
     $("#verbebidas").click(function() {
          if($('#bebidas').is(':visible')){
               $('#bebidas').hide();
          }
          else{
               $('#bebidas').show();
          }
     });

     //ao clicar ver bebidas hide ou show
     $("#vercomplementos").click(function() {
          if($('#complementos').is(':visible')){
               $('#complementos').hide();
          }
          else{
               $('#complementos').show();
          }
     });

     //ao clicar ver bebidas hide ou show
     $("#versobremesas").click(function() {
          if($('#sobremesas').is(':visible')){
               $('#sobremesas').hide();
          }
          else{
               $('#sobremesas').show();
          }
     });

     //ao clicar ver bebidas hide ou show
          $("#verextras").click(function() {
          if($('#extras').is(':visible')){
               $('#extras').hide();
          }
          else{
               $('#extras').show();
          }
     });
         /* $("#verhamburguers").click(function() {
               $('#hamburguer').hide();
               });*/
   
     //ao selecionar o input radio esconder
     $('#id_hamburguer input:radio').change(function() {
               $('#hamburguers').hide();
              /* if ($(this).is(':checked'))
               {
                   var hamburguera=($(this).val());
                   
                   alert(hamburguera);
               }*/
               
          });
     $('#id_bebida input:radio').change(function() {
               $('#bebidas').hide();
              /* alert("selecionou a bebida");*/
          });
     $('#id_complemento input:radio').change(function() {
               $('#complementos').hide();
          });
     $('#id_sobremesa input:radio').change(function() {
               $('#sobremesas').hide();
          });
     $('#id_extra input:radio').change(function() {
               $('#extras').hide();
          });


</script>
