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
          <button class="btn btn-primary" id="verhamburguers"> Ver Hambúrguers</button>
          <button class="btn btn-primary" id="verbebidas"> Ver Bebidas</button>
          <button class="btn btn-primary" id="vercomplementos"> Ver Complementos</button>
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
               <h2>Complementos</h2>
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
            <?= Html::submitButton('Efetuar Pedido', ['class' => 'btn btn-primary']) ?>



          <!-- modal para colocar informações do pedido
          <div class="modal fade" id="modalpedido" tabindex="-1" role="dialog" >
               <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                         <div class="modal-header">
                              <h5 class="modal-title" >O seu Pedido</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                   <span aria-hidden="true">&times;</span>
                              </button>
                         </div>
                         <div class="modal-body">
                              <?php

                              ?>
                         </div>

                    </div>
               </div>
          </div>
          -->


          <?php ActiveForm::end(); ?> 
           
          
       <?php } ?>

       


       

        

        
</div>
<script>
     //ao carregar coloca as div invisiveis
     $( document ).ready(function() {
     $('#hamburguers').hide();
     $('#bebidas').hide();
     $('#complementos').hide();
     $('#sobremesas').hide();
     $('#extras').hide();
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
               /*var radioValue = $('input[type="radio"]:checked').val();
               if(radioValue){
                    $.session_set($hamburguer->id,radioValue);
               }*/
               
          });
     $('#id_bebida input:radio').change(function() {
               $('#bebidas').hide();
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
