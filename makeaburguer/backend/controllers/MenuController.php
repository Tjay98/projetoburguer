<?php

namespace backend\controllers;

use app\models\Hamburger;
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
        if ((Yii::$app->user->can('view-admin'))||(Yii::$app->user->can('view-pedidos-funcionario'))) {
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
        $model = $this->findModel($id);

        if(Yii::$app->user->can('view-admin')) {
            $hamburger = Hamburger::find()
                ->where(['id' => $model->id_hamburger])
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

            return $this->render('view', [
                'model' => $model,
                'hamburger'=>$hamburger,
                'bebida'=>$bebida,
                'complemento'=>$complemento,
                'sobremesa'=>$sobremesa,
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

            $precoH= Hamburger::find()
                ->where(['id'=> $model->id_hamburger])
                ->sum('preco');

            $precoB= Produtos::find('preco')
                ->where(['id'=> $model->id_bebida])
                ->orWhere(['id'=> $model->id_sobremesa])
                ->orWhere(['id'=> $model->id_complemento])
                ->orWhere(['id'=> $model->id_extra])
                ->sum('preco');

//                $precoS= Produtos::find('preco')
//                    ->where(['id'=> $model->id_sobremesa]);
//
//
//                $precoC= Produtos::find('preco')
//                    ->where(['id'=> $model->id_complemento]);
//
//
//                $precoE=0;
//                if($model->id_extra!=0){
//                    $precoE= Produtos::find('preco')
//                        ->where(['id'=> $model->id_extra]);
//
//                }

            $preco = $precoB+$precoH;
            $model->preco=$preco;

            $model->save(false);
            return $this->redirect(['view', 'id' => $model->id]);
        }

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

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }

            return $this->render('update', [
                'model' => $model,
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
