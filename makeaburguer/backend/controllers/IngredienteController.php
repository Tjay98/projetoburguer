<?php

namespace backend\controllers;

use Yii;
use app\models\Hamburger;
use app\models\Ingrediente;
use app\models\IngredienteSearch;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * IngredienteController implements the CRUD actions for Ingrediente model.
 */
class IngredienteController extends Controller
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
     * Lists all Ingrediente models.
     * @return mixed
     */
    public function actionIndex()
    {
        if((Yii::$app->user->can('view-admin'))||(Yii::$app->user->can('view-pedidos-funcionario'))) {
            $searchModel = new IngredienteSearch();
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
     * Displays a single Ingrediente model.
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
     * Creates a new Ingrediente model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can('create-admin')) {
            $model = new Ingrediente();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }

            return $this->render('create', [
                'model' => $model,
            ]);
        }
        else
        {
            throw new ForbiddenHttpException();
        }
    }

    /**
     * Updates an existing Ingrediente model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if(Yii::$app->user->can('update-detalhes-admin')) {
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        }
        else
        {
            throw new ForbiddenHttpException();
        }
    }

    /**
     * Deletes an existing Ingrediente model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */

    public function actionDelete($id){

        if(Yii::$app->user->can('delete-admin')) {


            $verifica = Hamburger::find()
                ->select('id')
                ->where(['ingrediente1' => $id])
                ->orWhere(['ingrediente2' => $id])
                ->orWhere(['ingrediente3' => $id])
                ->orWhere(['ingrediente4' => $id])
                ->orWhere(['ingrediente5' => $id])
                ->orWhere(['ingrediente6' => $id])
                ->orWhere(['ingrediente7' => $id])
                ->orWhere(['ingrediente8' => $id])
                ->orWhere(['ingrediente9' => $id])
                ->orWhere(['ingrediente10' => $id])
                ->orWhere(['ingrediente_extra1' => $id])
                ->orWhere(['ingrediente_extra2' => $id])
                ->orWhere(['ingrediente_extra3' => $id])
                ->orWhere(['ingrediente_extra4' => $id])
                ->orWhere(['ingrediente_extra5' => $id])
                ->one();
            if( $verifica !== null ) {

                return $this->redirect(['hamburger/view','id' => $verifica->id]);
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
     * Finds the Ingrediente model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Ingrediente the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Ingrediente::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
