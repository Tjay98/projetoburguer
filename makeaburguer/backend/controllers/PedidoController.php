<?php

namespace backend\controllers;

use app\models\Hamburguer;
use app\models\Menu;
use app\models\Produtos;
use app\models\User;
use Yii;
use app\models\Pedido;
use backend\models\PedidoSearch;
use app\models\Promocoes;
use yii\db\Expression;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PedidoController implements the CRUD actions for Pedido model.
 */
class PedidoController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Pedido models.
     * @return mixed
     */
    public function actionIndex()
    {
        if((Yii::$app->user->can('view-admin'))||(Yii::$app->user->can('funcionario'))) {
            $searchModel = new PedidoSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
        else
        {
            throw new ForbiddenHttpException();
        }
    }

    /**
     * Displays a single Pedido model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        if((Yii::$app->user->can('view-admin'))||(Yii::$app->user->can('funcionario'))) {

            $user= User::find()
                ->where(['id'=>$model->id_user])
                ->one();

            return $this->render('view', [
                'model' => $model,
                'user'=> $user,
            ]);
        }
        else
        {
            throw new ForbiddenHttpException();

        }
    }

    /**
     * Creates a new Pedido model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */


    public function actionCreate()
    {
        if((Yii::$app->user->can('view-admin'))||(Yii::$app->user->can('funcionario'))) {
            $model = new Pedido();
            $model2 = new Menu();



            //verificar validade da promoção
            $hoje = date('d-M-Y');
            $hojed=strtotime($hoje);
            $listapromo=Promocoes::find()
                ->all();
            
                foreach ($listapromo as $promos){
                    if(($promos->data_inicio<=$hojed)&&($promos->data_fim>=$hojed)){
                        $promocao[$promos->id]=$promos;
                    }
                }

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

                return $this->redirect(['view', 'id' => $model->id]);
            }





            $getM = Menu::find()->all();
            $getU = User::find()->all();

            $hamburguer = Hamburguer::find()->all();

            $bebida = Produtos::find()
                ->where(['categoria' => 7])
                ->all();

            $sobremesa = Produtos::find()
                ->where(['categoria' => 8])
                ->all();

            $complemento = Produtos::find()
                ->where(['categoria' => 9])
                ->all();

            $produtos =Produtos::find()->all();

            return $this->render('create', [
                'model' => $model,
                'getM' => ArrayHelper::map($getM, 'id','id'),
                'getU' => ArrayHelper::map($getU, 'id','username'),
                'model2'=> $model2,
                'hamburguer' => ArrayHelper::map($hamburguer, 'id', 'nome'),
                'bebida' => ArrayHelper::map($bebida, 'id', 'nome'),
                'complemento' => ArrayHelper::map($complemento , 'id', 'nome'),
                'sobremesa' => ArrayHelper::map($sobremesa, 'id', 'nome'),
                'produtos' =>ArrayHelper::map($produtos, 'id', 'nome'),
                'promocao' => ArrayHelper::map($promocao, 'id', 'nome'),
            ]);
        }
        else
        {
            throw new ForbiddenHttpException();
        }
    }

    /**
     * Updates an existing Pedido model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if(Yii::$app->user->can('update-detalhes-admin')) {
            $model = $this->findModel($id);

            $getM = Menu::find()->all();
            $getU = User::find()->all();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }

            return $this->render('update', [
                'model' => $model,
                'getM' => ArrayHelper::map($getM, 'id','id'),
                'getU' => ArrayHelper::map($getU, 'id','username'),
            ]);
        }
        else
        {
            throw new ForbiddenHttpException();
        }
    }

    /**
     * Deletes an existing Pedido model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if(Yii::$app->user->can('delete-admin')) {
            $this->findModel($id)->delete();

            return $this->redirect(['index']);
        }
        else
        {
            throw new ForbiddenHttpException();
        }
    }

    /**
     * Finds the Pedido model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pedido the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pedido::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
