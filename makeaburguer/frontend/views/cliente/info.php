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
            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
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
                <center><?= Html::a('Editar informações', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?></center>
            </div>
        </div>




</div>
