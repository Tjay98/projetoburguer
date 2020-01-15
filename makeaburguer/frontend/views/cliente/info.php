<?php

//use app\models\Cliente;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Cliente */

$this->title = $model->username;

?>
<div class="cliente-view">




        <div class="card" style="width: 50rem;"><center><H1 id="idperfil">Perfil</H1></center>
            <?php echo Html::img('@web/imagens/avatar.png',['id'=>'profile-img-card']);?>
            <div class="card-body">

                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'username',
                        'email',
                        'nif',
                        'telemovel'

                    ],
                ]) ?>
                <center><?= Html::a('Editarinformações', ['update', 'id' => $model->id], ['name'=>'edita','id'=>'edita','class' => 'btn btn-primary']) ?></center>
            </div>
        </div>




</div>
