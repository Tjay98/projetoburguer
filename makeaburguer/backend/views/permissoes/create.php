<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AuthAssignment */

$this->title = 'Atribuir permissões';
$this->params['breadcrumbs'][] = ['label' => 'Auth Assignments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-assignment-create">


    <?= $this->render('_form', [
        'model' => $model,
        'utilizador'=>$utilizador,
        'role'=>$role,
    ]) ?>

</div>
