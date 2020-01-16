<?php
namespace frontend\controllers;

use app\models\Hamburguer;
use app\models\HamburguerC;
use app\models\Produtos;
use app\models\Pedido;
use app\models\Menu;
use app\models\Promocoes;
use app\models\User;
use app\models\Ingrediente;
use Yii;
use yii\base\InvalidArgumentException;
use yii\data\Pagination;
use yii\helpers\ArrayHelper;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\ForbiddenHttpException;
use yii\web\Request;

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
            $model3 = new HamburguerC();

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

            //componentes do hamburguer costumizado
            $pao = Ingrediente::find()
                ->where(['tipo' => 1])
                ->all();

            $molho = Ingrediente::find()
                ->where(['tipo' => 2])
                ->all();

            $carne = Ingrediente::find()
                ->where(['tipo' => 3])
                ->all();

            $vegetais = Ingrediente::find()
                ->where(['tipo' => 4])
                ->all();

            $queijo = Ingrediente::find()
                ->where(['tipo' => 5])
                ->all();

            $complementosing = Ingrediente::find()
                ->where(['tipo' => 6])
                ->all();


            //quando submete fazer as funçoes
            if (($model2->load(Yii::$app->request->post()))&&($model3->load(Yii::$app->request->post()))) {

                //procurar os ingredientes e somar o valor desses ingredientes
                if (!empty($model3)){
            
                $precohamburguerc= Ingrediente::find()
                    ->where(['id'=> $model3->pao])
                    ->orWhere(['id'=> $model3->carne])
                    ->orWhere(['id'=> $model3->molho])
                    ->orWhere(['id'=> $model3->vegetais])
                    ->orWhere(['id' => $model3->queijo])
                    ->orWhere(['id' => $model3->complementos])
                    ->asArray()
                    ->sum('preco');
                
                //atribuir esse preço ao modelo do hamburguer c 
                $model3->preco=$precohamburguerc;
                $model3->id_user=$utilizador;
                //guardar o modelo 
                $model3->save(false);//tirar false para meter a funcionar pq o hamburguer c nao ta a gravar adequadamente
                //atribuir o hamburguer costumizado ao menu do cliente
                $model2->id_hamburguerC=$model3->id;
                }
                else{
                    $precohamburguerc=0;
                }

                $precoHamburguer= Hamburguer::find()
                ->where(['id'=> $model2->id_hamburguer])
                ->sum('preco');

                //procurar o preço dos produtos selecionados
                $precoB= Produtos::find()
                    ->where(['id'=> $model2->id_bebida])
                    ->orWhere(['id'=> $model2->id_sobremesa])
                    ->orWhere(['id'=> $model2->id_complemento])
                    ->orWhere(['id'=> $model2->id_extra])
                    ->sum('preco');

                $preco =$precoB+$precoHamburguer+$model3->preco;
                
            
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
                'pao' => ArrayHelper::map($pao, 'id', 'nome'),
                'molho' => ArrayHelper::map($molho, 'id', 'nome'),
                'carne' => ArrayHelper::map($carne, 'id', 'nome'),
                'vegetais' => ArrayHelper::map($vegetais, 'id', 'nome'),
                'queijo' => ArrayHelper::map($queijo, 'id', 'nome'),
                'complementosing' => ArrayHelper::map($complementosing, 'id', 'nome'),
                'model' => $model,
                'model2'=> $model2,
                'model3'=>$model3,

            ]);
            



        }
        else
        {
            throw new ForbiddenHttpException();
        }
    }

}


