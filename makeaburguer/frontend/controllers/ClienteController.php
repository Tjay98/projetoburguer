<?php
namespace frontend\controllers;

use app\models\Hamburguer;
use app\models\Menu;
use app\models\Produtos;
use Yii;
use app\models\Pedido;
use yii\base\InvalidArgumentException;
use yii\data\Pagination;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\User;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;

class ClienteController extends Controller
{

    public function actionInfo()
    {
//        return $this->render('info');
        $nomeuser=Yii::$app->user->identity->username;

        $id=User::find()
                ->select('id')
                ->where(['username'=>$nomeuser]);

        if(Yii::$app->user->can('utilizador')) {
            return $this->render('info', [
                'model' => $this->findModel($id),
            ]);
        }
        else{
            throw new ForbiddenHttpException();
        }
    }

    public function actionUpdate()
    {
        if(Yii::$app->user->can('utilizador')) {
            $nomeuser=Yii::$app->user->identity->username;

            //procurar o id do utilizador atraves do username
            $id=User::find()
                ->select('id')
                ->where(['username'=>$nomeuser]);

            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post())) {
                $model->save();
                return $this->redirect(['info']);
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        }
        else{
            throw new ForbiddenHttpException();
        }
    }


    public function actionFaturas()
    {
        if(Yii::$app->user->can('utilizador')) {
            $nomeuser=Yii::$app->user->identity->username;
            
            //procurar o id do utilizador atraves do username
            $id=User::find()
                ->select('id')
                ->where(['username'=>$nomeuser]);



            $pedidolist=Pedido::find()
                ->where(['id_user'=>$id])
                ->orderBy (['id'=>SORT_DESC]);

            $pagination= new Pagination([
                'defaultPageSize' => 5,
                'totalCount' => $pedidolist->count(),
            ]);

            $pedidos=$pedidolist
                ->offset($pagination->offset)
                ->limit($pagination->limit)
                ->all();


            return $this->render('faturas', [
                'pedidos'=>$pedidos,
                'pagination'=>$pagination,


            ]);
        }
        else{
            throw new ForbiddenHttpException();
        }
    }

    public function actionDetalhesfatura(){
        if(Yii::$app->user->can('utilizador')) {

        if(!empty($_GET['id'])){
                    $pedidos=Pedido::find()
                        ->where(['id'=>$_GET['id']])
                        ->limit(1)
                        ->one();  
                
                    $menu=Menu::find()
                    ->where(['id'=>$pedidos->id_menu])
                    ->limit(1)
                    ->one();

                

            
                    if (!empty($menu->id_hamburguer)){
                        $hamburguer=Hamburguer::find()
                            ->where(['id'=>$menu->id_hamburguer])
                            ->one();
                    }
                    else{
                        $hamburguer='';
                    }
                        
            
                    if (!empty($menu->id_bebida)){
                        $bebida=Produtos::find()
                            ->where(['id'=>$menu->id_bebida])
                            ->one();
                    }
                    else {
                        $bebida = '';
                    }

                    if (!empty($menu->id_complemento)){
                        $complemento=Produtos::find()
                            ->where(['id'=>$menu->id_complemento])
                            ->one();
                    }
                    else{
                        $complemento='';
                    }
        
                    if (!empty($menu->id_sobremesa)){
                        $sobremesa=Produtos::find()
                            ->where(['id'=>$menu->id_sobremesa])
                            ->one();
                    }
                    else{
                        $sobremesa='';
                    }
        
                    if (!empty($menu->id_extra)){
                        $extra=Produtos::find()
                            ->where(['id'=>$menu->id_extra])
                            ->one();
                    }
                    else{
                        $extra='';
                    }
            


            return $this->render('detalhesfatura', [
                'pedidos'=>$pedidos,
                'menu'=>$menu,
                'hamburguer'=>$hamburguer,
                'bebida'=>$bebida,
                'complemento'=>$complemento,
                'sobremesa'=>$sobremesa,
                'extra'=>$extra,


            ]);
        }
        else{
            return $this->render('detalhesfatura');
        }
            
        }
        else{
            throw new ForbiddenHttpException();
        }
    }




    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


}