<?php

namespace app\controllers;

class hamburgercController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
