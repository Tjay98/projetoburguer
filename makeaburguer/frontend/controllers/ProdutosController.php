<?php
namespace frontend\controllers;

use app\models\Hamburguer;
use app\models\Produtos;
use app\models\Pedido;
use app\models\Menu;
use app\models\Promocoes;
use app\models\User;
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

        $contagem=$hamburguerlist->count();

        $pagination = new Pagination([
            'defaultPageSize' => 3,
            'totalCount' => $contagem,
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
                    'pagination'=>$pagination,
                    'contagem'=>$contagem,
                    ]);
    
            }
        

    }

    public function actionBebidas()
    {
        $bebidaslist=Produtos::find()
            ->where (['categoria'=>7]);

        $contagem=$bebidaslist->count();

        $pagination = new Pagination([
            'defaultPageSize' =>3,
            'totalCount' => $contagem,
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
                    'pagination'=>$pagination,
                    'contagem'=>$contagem,
                    ]);
    
            }
    }

    public function actionSobremesas()
    {
        $sobremesaslist=Produtos::find()
            ->where (['categoria'=>8]);
        
        $contagem=$sobremesaslist->count();

        $pagination = new Pagination([
            'defaultPageSize' => 3,
            'totalCount' => $contagem,
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
                    'pagination'=>$pagination,
                    'contagem'=>$contagem,
                    ]);
    
            }

    }
    public function actionAcompanhamentos()
    {

        $acompanhamentoslist=Produtos::find()
            ->where (['categoria'=>9]);

        $contagem=$acompanhamentoslist->count();

        $pagination= new Pagination([
            'defaultPageSize'=>2,
            'totalCount'=>$contagem,
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
                    'pagination'=>$pagination,
                    'contagem'=>$contagem,
                    ]);
    
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

            //definir utilizador para atribuir o menu
            $nomeutilizador=Yii::$app->user->identity->username;
            $utilizador=User::find()
                ->where(['username'=>$nomeutilizador])
                ->select('id');


            //procurar pelos vários componentes do pedido
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
            ->where(['categoria'=>7])
            ->orWhere(['categoria'=>8])
            ->all();


            //quando submete fazer as funçoes
            if ($model2->load(Yii::$app->request->post())) {



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
                
            
                //preço do menu
                $model2->preco=$preco;


                //se selecionar uma promoçao, o valor que está indicado é subtraido ao valor normal do pedido
                if(!empty($model->promocao)){                
                $valorpromo=Promocoes::find()
                    ->where(['id'=>$model->promocao])
                    ->one();


                $preco=$preco-($valorpromo->valor);

                }
                //preço do pedido caso haja promoção ^é removido o preço como no codigo acima
                $model->preco=$preco;


                //guardar modelo do menu
                $model2->save(false);

                //guardar modelo do pedido
                $model->id_user=$utilizador;
                $model->id_menu = $model2->id;

                $model->save(false);

                return $this->redirect(['pedido','id' => $model->id]);
            }


            return $this->render('pedido',[
                'hamburguers'=>$hamburguers,
                'bebidas'=>$bebidas,
                'sobremesas'=>$sobremesas,
                'complementos'=>$complementos,
                'extras'=>$extras,
                'model' => $model,
                'model2'=> $model2,

            ]);
            



        }
        else
        {
            throw new ForbiddenHttpException();
        }
    }

}


