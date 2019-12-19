<?php

namespace backend\controllers;

use app\models\Hamburger;
use app\models\Menu;

use app\models\Produtos;
use app\models\User;
use Yii;
use app\models\Pedido;
use backend\models\PedidoSearch;
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
        if((Yii::$app->user->can('view-admin'))||(Yii::$app->user->can('view-pedidos-funcionario'))) {
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
        if((Yii::$app->user->can('view-admin'))||(Yii::$app->user->can('view-pedidos-funcionario'))) {
            return $this->render('view', [
                'model' => $this->findModel($id),
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
        if(Yii::$app->user->can('create-admin')) {
            $model = new Pedido();
            $model2 = new Menu();

            if ($model2->load(Yii::$app->request->post()) && $model->load(Yii::$app->request->post())) {

                $precoH= Hamburger::find('preco')
                    ->where(['id'=> $model2->id_hamburger])
                    ->one();

                $precoB= Produtos::find('preco')
                    ->where(['id'=> $model2->id_bebida])
                    //->andWhere(['categoria'=>7])
                    ->one();

                $precoS= Produtos::find('preco')
                    ->where(['id'=> $model2->id_sobremesa])
                    ->one();

                $precoC= Produtos::find('preco')
                    ->where(['id'=> $model2->id_complemento])
                    ->one();

                if($model2->id_extra!=0){
                    $precoE= Produtos::find('preco')
                    ->where(['id'=> $model2->id_extra])
                    ->one();
                }


                $model2->save(false);



                $model->id_menu = $model2->id;

                $model->save(false);

                return $this->redirect(['view', 'id' => $model->id]);
            }

            $getM = Menu::find()->all();
            $getU = User::find()->all();

            $getH = Hamburger::find()->all();

            $Bebida = Produtos::find()
                ->where(['categoria' => 7])
                ->all();

            $Sobremesa = Produtos::find()
                ->where(['categoria' => 8])
                ->all();

            $complemento = Produtos::find()
                ->where(['categoria' => 9])
                ->all();

            return $this->render('create', [
                'model' => $model,
                'getM' => ArrayHelper::map($getM, 'id','id'),
                'getU' => ArrayHelper::map($getU, 'id','username'),
                'model2'=> $model2,
                'getH' => ArrayHelper::map($getH, 'id', 'nome'),
                'Bebida' => ArrayHelper::map($Bebida, 'id', 'nome'),
                'complemento' => ArrayHelper::map($complemento , 'id', 'nome'),
                'Sobremesa' => ArrayHelper::map($Sobremesa, 'id', 'nome'),
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
