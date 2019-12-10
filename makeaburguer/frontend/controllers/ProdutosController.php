<?php
namespace frontend\controllers;

use app\models\Hamburger;
use app\models\Produtos;
use Yii;
use yii\base\InvalidArgumentException;
use yii\helpers\ArrayHelper;
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

    public function actionHamburguers()
    {
        $query = Hamburger::find();


        $hamburguers = $query->orderBy('id')
            ->all();

        return $this->render('hamburguers', [
            'hamburguers' => $hamburguers,

        ]);

    }
    public function actionAcompanhamentos()
    {
        $acompanhamentos=Produtos::find()
        ->where (['categoria'=>9])
        ->all();


        return $this->render('acompanhamentos',[
            'acompanhamentos'=>$acompanhamentos
        ]);
    }
    public function actionBebidas()
    {
        $bebidas=Produtos::find()
            ->where (['categoria'=>7])
            ->orderBy('id')
            ->all();


        return $this->render('bebidas',[
            'bebidas'=>$bebidas
        ]);
    }
    public function actionSobremesas()
    {
        $sobremesas=Produtos::find()
            ->where (['categoria'=>8])
            ->orderBy('id')
            ->all();


        return $this->render('sobremesas',[
            'sobremesas'=>$sobremesas
        ]);
    }

}
