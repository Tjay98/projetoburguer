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
                ->where(['id_user'=>$id]);

            $pagination= new Pagination([
                'defaultPageSize' => 5,
                'totalCount' => $pedidolist->count(),
            ]);

            $pedidos=$pedidolist
                ->offset($pagination->offset)
                ->limit($pagination->limit)
                ->all();
            $contador=0;

            return $this->render('faturas', [
                'pedidos'=>$pedidos,
                'pagination'=>$pagination,
                'contador'=>$contador,

            ]);
        }
        else{
            throw new ForbiddenHttpException();
        }
    }

    public function actionDetalhesfatura($id){
        if(Yii::$app->user->can('utilizador')) {

            $pedidos=Pedido::find()
                ->where(['id'=>$id])
                ->all();
            $menu=Menu::find()
                ->where(['id'=>$pedidos->id_menu])
                ->all();
            $hamburguer=Hamburguer::find()
                ->where(['id'=>$menu->id_hamburguer]);

//            $bebida=Produtos::find()
//                ->where

            return $this->render('detalhesfatura', [
                'pedidos'=>$pedidos,

            ]);
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