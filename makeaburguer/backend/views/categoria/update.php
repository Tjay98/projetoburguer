<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Categoria */

$this->title = 'Atualizar Categoria: ' . $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Categorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nome, 'url' => ['view', 'nome' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="categoria-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
