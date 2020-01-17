<?php

use app\models\Cliente;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Cliente */

$this->title = 'pedido';

?>
<div class="cliente-view">

    <div class="card card-container">
        <center><H1 id="idperfil">INFO</H1></center>
        <?php if(!empty($pedidos)){ ?>

            <?php //var_dump($hamburguerc);
                    echo '<h5 style="color:white">'.$pedidos->data.'</h5>';
                    echo '<p style="color:white">Id do menu: '.$pedidos->id_menu.'</p>';
                
                    echo'<table class="table table-striped table-bordered detail-view">
                                <tbody>
                                    <tr>
                                        <th>Produto</th>
                                        <th>Valor</th>
                                        <th>Detalhes</th>
                                    </tr>';
                    if(!empty($hamburguerc)){
                        echo '<tr>';
                        echo '<td>Hambúrguer costumizado</td>';
                        echo '<td>'.$hamburguerc->preco.'</td>';
                        echo '<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#hamburguerc">Detalhes</button></td>';
                        echo '</tr>';
                        ?>
                        <div class="modal fade" id="hamburguerc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title"><center>Hambúrguer costumizado</center></h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                        <center><h4>Ingredientes:</h4></center>
                                        <?php //verificar se os ingredientes estão vazios
                                        if(!empty($pao)){
                                            echo"<center>Tipo de Pão: ".$pao->nome." </center>";
                                        }
                                        ?>
                                        <?php 
                                        if(!empty($carne)){
                                            echo"<center>Tipo de Carne: ".$carne->nome." </center>";
                                        }
                                        ?>
                                        <?php 
                                        if(!empty($vegetais)){
                                            echo"<center>Tipo de vegetais: ".$vegetais->nome." </center>";
                                        }
                                        ?>
                                        <?php 
                                        if(!empty($molho)){
                                            echo"<center>Tipo de molho: ".$molho->nome." </center>";
                                        }
                                        ?>
                                        <?php 
                                        if(!empty($queijo)){
                                            echo"<center>Tipo de Carne: ".$queijo->nome." </center>";
                                        }
                                        ?>
                                        <?php 
                                        if(!empty($complementosing)){
                                            echo"<center>Tipo de Carne: ".$complementosing->nome." </center>";
                                        }
                                        ?>

                                        <center><h5>Preço: <?= $hamburguerc->preco?>€</h5></center>

                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    if(!empty($hamburguer)){
                        echo '<tr>';
                        echo '<td>'.$hamburguer->nome.'</td>';
                        echo '<td>'.$hamburguer->preco.'</td>';
                        echo '<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#hamburguer">Detalhes</button></td>';
                        echo '</tr>';
                        ?>
                        <div class="modal fade" id="hamburguer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title"><center><?=$hamburguer->nome?></center></h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                        <div class="modal-body">
                                        <center><?php echo Html::img(Yii::$app->request->baseUrl.'/backend/web/'.$hamburguer->imagem,['class'=>'imagemproduto']);?></center>
                                        <br>
                                        <center><h4>Descrição:</h4></center>
                                        <center> <?= $hamburguer->descricao?> </center>
                                        <br>
                                        <center><h5>Preço: <?= $hamburguer->preco?>€</h5></center>
                                        </div>
                                </div>
                            </div>
                        </div>
                        
                    <?php
                    }                
                    if(!empty($bebida)){
                        echo '<tr>';
                        echo '<td>'.$bebida->nome.'</td>';
                        echo '<td>'.$bebida->preco.'</td>';
                        echo '<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bebida">Detalhes</button></td>';
                        echo '</tr>';
                        ?>
                        <div class="modal fade" id="bebida" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title"><center><?=$bebida->nome?></center></h1>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                        <div class="modal-body">
                                        <center><?php echo Html::img(Yii::$app->request->baseUrl.'/backend/web/'.$bebida->imagem,['class'=>'imagemproduto']);?></center>
                                        <br>
                                        <center><h5>Preço: <?= $bebida->preco?>€</h5></center>
                                        </div>
                                </div>
                            </div>
                        </div>
                        
                    <?php
                    }
                    if(!empty($complemento)){
                        echo '<tr>';
                        echo '<td>'.$complemento->nome.'</td>';
                        echo '<td>'.$complemento->preco.'</td>';
                        echo '<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#complemento">Detalhes</button></td>';
                        echo '</tr>';
                        ?>
                        <div class="modal fade" id="complemento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title"><center><?=$complemento->nome?></center></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                        <div class="modal-body">
                                        <center><?php echo Html::img(Yii::$app->request->baseUrl.'/backend/web/'.$complemento->imagem,['class'=>'imagemproduto']);?></center>
                                        <br>
                                        <center><h5>Preço: <?= $complemento->preco?>€</h5></center>
                                        </div>
                                </div>
                            </div>
                        </div>
                        
                    <?php
                    
                    }
                    if(!empty($sobremesa)){
                        echo '<tr>';
                        echo '<td>'.$sobremesa->nome.'</td>';
                        echo '<td>'.$sobremesa->preco.'</td>';
                        echo '<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#sobremesa">Detalhes</button></td>';
                        echo '</tr>';
                        ?>
                        <div class="modal fade" id="sobremesa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title"><center><?=$sobremesa->nome?></center></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                        <div class="modal-body">
                                        <center><?php echo Html::img(Yii::$app->request->baseUrl.'/backend/web/'.$sobremesa->imagem,['class'=>'imagemproduto']);?></center>
                                        <br>
                                        <center><h5>Preço: <?= $sobremesa->preco?>€</h5></center>
                                        </div>
                                </div>
                            </div>
                        </div>
                        
                    <?php }
                    if(!empty($extra)){
                        echo '<tr>';
                        echo '<td>'.$extra->nome.'</td>';
                        echo '<td>'.$extra->preco.'</td>';
                        echo '<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#extra">Detalhes</button></td>';
                        echo '</tr>';
                        ?>
                        <div class="modal fade" id="extra" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title"><center><?=$extra->nome?></center></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                        <div class="modal-body">
                                        <center><?php echo Html::img(Yii::$app->request->baseUrl.'/backend/web/'.$extra->imagem,['class'=>'imagemproduto']);?></center>
                                        <br>
                                        <center><h5>Preço: <?= $extra->preco?>€</h5></center>
                                        </div>
                                </div>
                            </div>
                        </div>
                    <?php } 
                    echo '</tbody></table>';
                    ?>
                    <!-- Button trigger modal -->



        <?php }
        else{
            echo '<center><h2>Não selecionou nenhum pedido</h2></center>';
        } ?>  
      

    </div>
</div>
