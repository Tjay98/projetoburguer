<?php

namespace backend\controllers;

use app\models\Hamburguer;
use app\models\Pedido;
use app\models\Produtos;
use Yii;
use app\models\Menu;
use app\models\MenuSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MenuController implements the CRUD actions for Menu model.
 */
class MenuController extends Controller
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
     * Lists all Menu models.
     * @return mixed
     */
    public function actionIndex()
    {
        if ((Yii::$app->user->can('view-admin'))||(Yii::$app->user->can('funcionario'))) {
            $searchModel = new MenuSearch();
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
     * Displays a single Menu model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {


        if((Yii::$app->user->can('view-admin'))||(Yii::$app->user->can('funcionario'))) {
            $model = $this->findModel($id);

            $hamburguer = Hamburguer::find()
                ->where(['id' => $model->id_hamburguer])
                ->one();

            $bebida = Produtos::find()
                ->where(['id' => $model->id_bebida])
                ->one();

            $complemento = Produtos::find()
                ->where(['id' => $model->id_complemento])
                ->one();

            $sobremesa = Produtos::find()
                ->where(['id' => $model->id_sobremesa])
                ->one();

            $produtos = Produtos::find()
                ->where(['id' => $model->id_extra])
                ->one();



            return $this->render('view', [
                'model' => $model,
                'hamburguer'=>$hamburguer,
                'bebida'=>$bebida,
                'complemento'=>$complemento,
                'sobremesa'=>$sobremesa,
                'produtos' =>$produtos,
            ]);
        }
        else
        {
            throw new ForbiddenHttpException();
        }
    }

    /**
     * Creates a new Menu model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can('create-admin')) {
            $model = new Menu();

            if ($model->load(Yii::$app->request->post())){

            $precoH= Hamburguer::find()
                ->where(['id'=> $model->id_hamburguer])
                ->sum('preco');

            $precoB= Produtos::find('preco')
                ->where(['id'=> $model->id_bebida])
                ->orWhere(['id'=> $model->id_sobremesa])
                ->orWhere(['id'=> $model->id_complemento])
                ->orWhere(['id'=> $model->id_extra])
                ->sum('preco');

            $preco = $precoB+$precoH;
            $model->preco=$preco;

            $model->save(false);
            return $this->redirect(['view', 'id' => $model->id]);
        }

            $getH = Hamburguer::find()->all();

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
                'getH' => ArrayHelper::map($getH, 'id', 'nome'),
                'bebida' => ArrayHelper::map($bebida, 'id', 'nome'),
                'complemento' => ArrayHelper::map($complemento , 'id', 'nome'),
                'sobremesa' => ArrayHelper::map($sobremesa, 'id', 'nome'),
                'produtos' =>ArrayHelper::map($produtos, 'id', 'nome'),
            ]);
        }
        else
        {
            throw new ForbiddenHttpException();
        }
    }

    /**
     * Updates an existing Menu model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if(Yii::$app->user->can('update-detalhes-admin')) {
            $model = $this->findModel($id);

            $getH = Hamburguer::find()->all();

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
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }

            return $this->render('update', [
                'model' => $model,
                'getH' => ArrayHelper::map($getH, 'id', 'nome'),
                'bebida' => ArrayHelper::map($bebida, 'id', 'nome'),
                'complemento' => ArrayHelper::map($complemento , 'id', 'nome'),
                'sobremesa' => ArrayHelper::map($sobremesa, 'id', 'nome'),
                'produtos' =>ArrayHelper::map($produtos, 'id', 'nome'),
            ]);
        }
        else
        {
            throw new ForbiddenHttpException();
        }
    }

    /**
     * Deletes an existing Menu model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if(Yii::$app->user->can('delete-admin')) {

            $verifica = Pedido::find()
                ->select('id')
                ->where(['id_menu' => $id])
                ->one();

            if( $verifica !== null ) {

                return $this->redirect(['pedido/view','id' => $verifica->id]);
            }

            else{
                $this->findModel($id)->delete();
                return $this->redirect(['index']);
            }

        }
        else{
            throw new ForbiddenHttpException();
        }
    }

    /**
     * Finds the Menu model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Menu the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Menu::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
