<?php

//use app\models\Cliente;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\DetailView;
use yii\widgets\LinkPager;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\Cliente */

$this->title = 'Faturas';

?>
<div class="cliente-view">




        <div class="card" style="width: 50rem;"><center><H1 id="idperfil"><?= $this->title?></H1></center>
            <div class="card-body">
                        <br>
                        <br>
                        <?php Pjax::begin() ?>
                    <table class="table table-striped table-bordered detail-view">
                        <tbody>
                        <tr><th>Pedido</th><th>Data</th><th>Detalhes</th></tr>
                        <?php  foreach ($pedidos as $pedido): ?>

                            <?php if(!empty($pedidos)){
                                $contador++;
                                echo "<tr><th>$contador</th><td>".$pedido->data."</td>";?>
                                <td><?= Html::a('Info', ['cliente/detalhesfatura', 'id' => $pedido->id]) ?></td>
                                </tr>
                            <?php }
                            else{
                                echo"<h3>Ainda não efetuou nenhum pedido</h3>";
                            }?>
                        <?php endforeach; ?>
                        </tbody>
                    </table>



                    </div>
                </div> <center><?= LinkPager::widget(['pagination' => $pagination]) ?></center>
                
                <?php Pjax::end(); ?>
</div>

