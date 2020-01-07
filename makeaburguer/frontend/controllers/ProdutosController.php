<?php
namespace frontend\controllers;

use app\models\Hamburguer;
use app\models\Produtos;
use app\models\Pedido;
use app\models\Menu;
use app\models\Promocoes;
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
            $model = new Pedido();
            $model2 = new Menu();


            $hamburguers=Hamburguer::find()
                ->all();
            $bebidas=Produtos::find()
                ->where(['categoria'=>7])
                ->all();
            $sobremesas=Produtos::find()
            ->where(['categoria'=>8])
            ->all();
            $complementos=Produtos::find()
            ->where(['categoria'=>9])
            ->all();
            $extras=Produtos::find()
            ->all();
            if ($model2->load(Yii::$app->request->post()) && $model->load(Yii::$app->request->post())) {

                


                $precoH= Hamburguer::find()
                    ->where(['id'=> $model2->id_hamburguer])
                    ->sum('preco');

                $precoB= Produtos::find()
                    ->where(['id'=> $model2->id_bebida])
                    ->orWhere(['id'=> $model2->id_sobremesa])
                    ->orWhere(['id'=> $model2->id_complemento])
                    ->orWhere(['id'=> $model2->id_extra])
                    ->sum('preco');

                $preco =$precoB+$precoH;
                
            


                //se selecionar uma promoçao, o valor que está indicado é subtraido ao valor normal do pedido
                if(!empty($model->promocao)){                
                $valorpromo=Promocoes::find()
                    ->where(['id'=>$model->promocao])
                    ->one();


                $preco=$preco-($valorpromo->valor);

                }

                //preço do menu
                $model2->preco=$preco;

                //preço do pedido
                $model->preco=$preco;

                $model2->save(false);

                $model->id_menu = $model2->id;

                $model->save(false);

                return renderPartial(['pedido']);
            }


            return $this->render('pedido',[
                'hamburguers'=>$hamburguers,
                'bebidas'=>$bebidas,
                'sobremesas'=>$sobremesas,
                'complementos'=>$complementos,
                'extras'=>$extras,
                'model' => $model,
                //'getM' => ArrayHelper::map($getM, 'id','id'),
               //'getU' => ArrayHelper::map($getU, 'id','username'),
                'model2'=> $model2,

            ]);
            



        }
        else
        {
            throw new ForbiddenHttpException();
        }
    }

}
