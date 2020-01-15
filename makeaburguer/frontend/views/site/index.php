<?php

/* @var $this yii\web\View */


use yii\bootstrap\Button;
use yii\bootstrap\Html;

$this->title = 'Make A Burguer';
?>
<div class="site-index">
    <div class="jumbotron">
      <div class="col-lg-12">
          <!--Coluna 1 index -->
          <div class="col-lg-4">
            <div class="card" style='background-image:linear-gradient(orange,yellow)'><center><H4 style="color:white">Veja os nossos produtos</H4></center>
              <div class="card-body">
                <?php echo Html::img(Yii::$app->request->baseUrl.'/backend/web/imagens/hamburguers/hamburguer de bacon.jpg',['class'=>'imagemproduto'])?>
                
              </div> 
            </div>
          </div>
          <!--Coluna 2 index -->
          <?php if (Yii::$app->user->can('view-utilizador')){?>
          <div class="col-lg-4">
              <div class="card" style='background-image:linear-gradient(orange,yellow)'><center><H4 style="color:white">Crie o seu pedido</H4></center>
                <div class="card-body">
                  <?php 
                  echo Html::a('Criar pedido <p class="glyphicon glyphicon-shopping-cart" style="color:white"></p>', 
                  ['/produtos/pedido'], 
                  ['class'=>'btn btn-primary']) ?>
                  
                </div> 
              </div>
          </div>
          <?php }
          else {?>
          <div class="col-lg-4">
              <div class="card" style='background-image:linear-gradient(orange,yellow)'><center><H4 style="color:white">Para criar um pedido registe-se ou faça login</H4></center>
                <div class="card-body">
                  <?php 
                  echo Html::a('Registro <p class="glyphicon glyphicon-edit" style="color:white"></p>', 
                  ['/site/signup'], 
                  ['class'=>'btn btn-primary']) ?>
                  <br>
                  <br>
                  <?php 
                  echo Html::a('Login <p class="glyphicon glyphicon-edit" style="color:white"></p>', 
                  ['/site/login'], 
                  ['class'=>'btn btn-primary']) ?>
                  
                </div> 
              </div>
          </div>
          <?php }?>
          <!--Coluna 3 index -->
          <div class="col-lg-4">
              <div class="card" ><center><H4 style="color:white">Promoções atuais</H4></center>
                <div class="card-body">
                  <?php if (!empty($promocoes)){
                          foreach($promocoes as $promocao)
                            echo "<hr><br><h4 style='color:white'>Promocão válida atual<br><br>Utilize o código:<br><b>".$promocao->nome."</b></h4>"."<br><h4 style='color:white'>No valor de:".$promocao->valor."€</h4>";
                            }
                            else{
                              echo"<br><h4>Não existem promoções válidas atualmente</h4>";
                            }
                            ?>
                </div> 
              </div>
          </div>
      </div>
    </div>
</div>
