<?php
namespace frontend\controllers;

use app\models\Hamburguer;
use app\models\Produtos;
use Yii;
use yii\base\InvalidArgumentException;
use yii\data\Pagination;
use yii\helpers\ArrayHelper;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\ForbiddenHttpException;


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
        $hamburguerlist = Hamburguer::find();

        $pagination = new Pagination([
            'defaultPageSize' => 2,
            'totalCount' => $hamburguerlist->count(),
        ]);

        $hamburguers = $hamburguerlist->orderBy('id')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        if (Yii::$app->request->isPjax) {    

                return $this->renderPartial('hamburguers',[
                    'hamburguers' => $hamburguers,
                    'pagination'=>$pagination]);
    
            } else {
    
                return $this->render('hamburguers', [
                    'hamburguers' => $hamburguers,
                    'pagination'=>$pagination,]);
    
            }
        

    }

    public function actionBebidas()
    {
        $bebidaslist=Produtos::find()
            ->where (['categoria'=>7]);

        $pagination = new Pagination([
            'defaultPageSize' =>2,
            'totalCount' => $bebidaslist->count(),
        ]);

        $bebidas = $bebidaslist->orderBy('id')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

            if (Yii::$app->request->isPjax) {    

                return $this->renderPartial('bebidas',[
                    'bebidas' => $bebidas,
                    'pagination'=>$pagination]);
        
            } else {
    
                return $this->render('bebidas', [
                    'bebidas' => $bebidas,
                    'pagination'=>$pagination,]);
    
            }
    }

    public function actionSobremesas()
    {
        $sobremesaslist=Produtos::find()
            ->where (['categoria'=>8]);

        $pagination = new Pagination([
            'defaultPageSize' => 2,
            'totalCount' => $sobremesaslist->count(),
        ]);

        $sobremesas = $sobremesaslist->orderBy('id')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        
            if (Yii::$app->request->isPjax) {    

                return $this->renderPartial('sobremesas',[
                    'sobremesas' => $sobremesas,
                    'pagination'=>$pagination]);
    
            } else {
    
                return $this->render('sobremesas', [
                    'sobremesas' => $sobremesas,
                    'pagination'=>$pagination,]);
    
            }

    }
    public function actionAcompanhamentos()
    {

        $acompanhamentoslist=Produtos::find()
            ->where (['categoria'=>9]);

        $pagination= new Pagination([
            'defaultPageSize'=>2,
            'totalCount'=>$acompanhamentoslist->count(),
        ]);

        $acompanhamentos=$acompanhamentoslist->orderBy('id')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

            if (Yii::$app->request->isPjax) {    

                return $this->renderPartial('acompanhamentos',[
                    'acompanhamentos' => $acompanhamentos,
                    'pagination'=>$pagination]);
    
            } else {
    
                return $this->render('acompanhamentos', [
                    'acompanhamentos' => $acompanhamentos,
                    'pagination'=>$pagination,]);
    
            }

    }

    public function actionInfoprodutos($id){
        $produto=Produtos::find()
            ->where(['id'=>$id])
            ->all();

        return $this->render('infoprodutos',[
            'produto'=>$produto,
        ]);
    }



    public function actionInfohamburguer($id){
        $hamburguer=Hamburguer::find()
            ->where(['id'=>$id])
            ->all();

        return $this->render('infohamburguer',[
            'hamburguer'=>$hamburguer,
        ]);
    }




    public function actionPedido(){
        if (yii::$app->user->can('utilizador')){
            return $this->render('pedido',[
                    
            ]);
            



        }
        else
        {
            throw new ForbiddenHttpException();
        }
    }

}
