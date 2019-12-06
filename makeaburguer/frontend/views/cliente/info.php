<?php

use app\models\Cliente;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Cliente */

$this->title = $model->username;

$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="cliente-view">


    <H1>Perfil</H1>
    <p >
        <?= Html::a('Editar informações', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

    </p>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'username',
            'email',
            'nif',
            'telemovel'

        ],
    ]) ?>

</div>
