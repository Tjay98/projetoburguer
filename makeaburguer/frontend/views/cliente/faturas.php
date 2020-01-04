<?php

//use app\models\Cliente;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Cliente */

$this->title = 'Faturas';

?>
<div class="cliente-view">




        <div class="card" style="width: 50rem;"><center><H1 id="idperfil"><?= $this->title?></H1></center>
            <div class="card-body">

                <?= DetailView::widget([
                    'model' => $pedidos,
                    'attributes' => [
                        'id_user',
                        'id_menu',
                        'promocao',
                        'preco',
                        'data',

                    ],
                ]) ?>
            
            </div>
        </div>




</div>
