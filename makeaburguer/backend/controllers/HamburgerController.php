<?php

namespace backend\controllers;

use app\models\Produtos;
use Yii;
use app\models\Hamburger;
use backend\models\HamburgerSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * HamburgerController implements the CRUD actions for Hamburger model.
 */
class HamburgerController extends Controller
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
     * Lists all Hamburger models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->can('view-admin')) {
            $searchModel = new HamburgerSearch();
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
     * Displays a single Hamburger model.
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
     * Creates a new Hamburger model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can('create-admin')) {
            $model = new Hamburger();

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
                'molho' => ArrayHelper::map($molho, 'id', 'nome'),
                'carne' => ArrayHelper::map($carne, 'id', 'nome'),
                'vegetais' => ArrayHelper::map($vegetais, 'id', 'nome'),
                'queijo' => ArrayHelper::map($queijo, 'id', 'nome'),
                'complemento' => ArrayHelper::map($complemento, 'id', 'nome'),
            ]);
        }
        else
        {
            throw new ForbiddenHttpException();
        }
    }

    /**
     * Updates an existing Hamburger model.
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

            return $this->render('update', [
                'model' => $model,
                'pao' => ArrayHelper::map($pao, 'id', 'nome'),
                'molho' => ArrayHelper::map($molho, 'id', 'nome'),
                'carne' => ArrayHelper::map($carne, 'id', 'nome'),
                'vegetais' => ArrayHelper::map($vegetais, 'id', 'nome'),
                'queijo' => ArrayHelper::map($queijo, 'id', 'nome'),
                'complemento' => ArrayHelper::map($complemento, 'id', 'nome'),
            ]);
        }
    }

    /**
     * Deletes an existing Hamburger model.
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
        else{
            throw new ForbiddenHttpException();
        }
    }

    /**
     * Finds the Hamburger model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Hamburger the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Hamburger::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
