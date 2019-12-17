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

    <div class="card card-container">
    <center><H1 id="idperfil">Perfil</H1></center>



    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'username',
            'email',
            'nif',
            'telemovel'

        ],
    ]) ?>
    <p >
        <center><?= Html::a('Editar informações', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?></center>

    </p>
    </div>
</div>
