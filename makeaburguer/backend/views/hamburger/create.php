<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Hamburger */

$this->title = 'Criar Hamburger';
$this->params['breadcrumbs'][] = ['label' => 'Hamburgers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hamburger-create">



    <?= $this->render('_form', [
        'model' => $model,
        'getI' => $getI,
    ]) ?>

</div>
