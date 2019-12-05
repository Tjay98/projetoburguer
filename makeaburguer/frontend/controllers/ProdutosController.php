<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;


/**
 * Site controller
 */
class ProdutosController extends Controller
{
    /**
     * {@inheritdoc}
     */

    public function actionHamburguer()
    {
        return $this->render('hamburguers');
    }
    public function actionComplementos()
    {
        return $this->render('complementos');
    }
    public function actionBebidas()
    {
        return $this->render('bebidas');
    }
    public function actionSobremesas()
    {
        return $this->render('sobremesas');
    }

}
