<?php

namespace backend\controllers;

use Yii;
use app\models\Promocoes;
use backend\models\PromocoesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;

/**
 * PromocoesController implements the CRUD actions for Promocoes model.
 */
class PromocoesController extends Controller
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
     * Lists all Promocoes models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->can('view-admin')) {
            $searchModel = new PromocoesSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
        else{
            throw new ForbiddenHttpException();
        }
    }

    /**
     * Displays a single Promocoes model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if(Yii::$app->user->can('view-admin')) {
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
        else{
            throw new ForbiddenHttpException();
        }

    }

    /**
     * Creates a new Promocoes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can('view-admin')) {
            $model = new Promocoes();

            if ($model->load(Yii::$app->request->post())) {
                $inicio=strtotime($model->data_inicio);
                $model->data_inicio=$inicio;
                $hoje = date('d-M-Y');
                $hojed=strtotime($hoje); 
                $model->data_fim=$hojed;
                $model->save(false);
                return $this->redirect(['index']);

            }

            return $this->render('create', [
                'model' => $model,
            ]);
        }
        else{
            throw new ForbiddenHttpException();
        }
    }

    /**
     * Updates an existing Promocoes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if(Yii::$app->user->can('view-admin')) {
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        }
        else{
            throw new ForbiddenHttpException();
        }
    }

    /**
     * Deletes an existing Promocoes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if(Yii::$app->user->can('view-admin')) {
            $this->findModel($id)->delete();

            return $this->redirect(['index']);
        }
        else{
            throw new ForbiddenHttpException();
        }
    }

    /**
     * Finds the Promocoes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Promocoes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Promocoes::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
