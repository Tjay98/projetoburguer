<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = $name;
?>
<section class="content">

    <div class="error-page">
        <h2 class="headline text-info"><i class="fa fa-warning text-yellow"></i></h2>

        <div class="error-content">
            <h3><?= $name ?></h3>

            <p>
                <?= nl2br(Html::encode($message)) ?>
            </p>

            <p>
                O conteúdo que tentou aceder não está disponível, ou não tem permissão para o visualizar.<br>
                <a href='<?= Yii::$app->homeUrl ?>'><strong>Voltar ao Inicio</strong></a>
            </p>


        </div>
    </div>

</section>
