<?php

namespace backend\controllers;

use Yii;
use app\models\Hamburgerc;
use backend\models\HamburgercSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * HamburgercController implements the CRUD actions for Hamburgerc model.
 */
class HamburgercController extends Controller
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
     * Lists all Hamburgerc models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->can('view-admin')) {
            $searchModel = new HamburgercSearch();
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
     * Displays a single Hamburgerc model.
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
        else
        {
            throw new ForbiddenHttpException();
        }
    }

    /**
     * Creates a new Hamburgerc model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can('create-admin')) {
            $model = new Hamburgerc();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }

            $pao = Produtos::find()
                ->where(['categoria' => 1])
                ->all();

            $molho = Produtos::find()
                ->where(['categoria' => 2])
                ->all();

            $carne = Produtos::find()
                ->where(['categoria' => 3])
                ->all();

            $vegetais = Produtos::find()
                ->where(['categoria' => 4])
                ->all();

            $queijo = Produtos::find()
                ->where(['categoria' => 5])
                ->all();

            $complemento = Produtos::find()
                ->where(['categoria' => 6])
                ->all();

            return $this->render('create', [
                'model' => $model,
                'pao' => ArrayHelper::map($pao, 'id', 'nome'),

            ]);
        }
        else
        {
            throw new ForbiddenHttpException();

        }
    }

    /**
     * Updates an existing Hamburgerc model.
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
     * Deletes an existing Hamburgerc model.
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
     * Finds the Hamburgerc model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Hamburgerc the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Hamburgerc::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
