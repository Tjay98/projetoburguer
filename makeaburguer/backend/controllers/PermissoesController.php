<?php

namespace backend\controllers;

use Yii;
use backend\models\AuthAssignment;
use backend\models\PermissoesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\User;
use yii\helpers\ArrayHelper;
use yii\web\ForbiddenHttpException;

/**
 * PermissoesController implements the CRUD actions for AuthAssignment model.
 */
class PermissoesController extends Controller
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
     * Lists all AuthAssignment models.
     * @return mixed
     */
    public function actionIndex()
    {   if(Yii::$app->user->can('view-admin')) {
            $searchModel = new PermissoesSearch();
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
     * Displays a single AuthAssignment model.
     * @param string $item_name
     * @param integer $user_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($item_name, $user_id)
    {
        if(Yii::$app->user->can('view-admin')) {
            return $this->render('view', [
                'model' => $this->findModel($item_name, $user_id),
            ]);
            }
            else{
                throw new ForbiddenHttpException();
            }
    }

    /**
     * Creates a new AuthAssignment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {   if(Yii::$app->user->can('view-admin')) {
            $model = new AuthAssignment();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'item_name' => $model->item_name, 'user_id' => $model->user_id]);
            }


            $utilizador = User::find()->all();


            return $this->render('create', [
                'model' => $model,
                'utilizador' => ArrayHelper::map($utilizador, 'id','username'),

            ]);
        }
        else{
            throw new ForbiddenHttpException();
        }
    }

    /**
     * Updates an existing AuthAssignment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $item_name
     * @param integer $user_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($item_name, $user_id)
    {
        if(Yii::$app->user->can('view-admin')) {
        $model = $this->findModel($item_name, $user_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'item_name' => $model->item_name, 'user_id' => $model->user_id]);
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
     * Deletes an existing AuthAssignment model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $item_name
     * @param integer $user_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($item_name, $user_id)
    {
        if(Yii::$app->user->can('view-admin')) {
            $this->findModel($item_name, $user_id)->delete();

            return $this->redirect(['index']);
        }
        else
        {
            throw new ForbiddenHttpException();
        }
    }

    /**
     * Finds the AuthAssignment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $item_name
     * @param integer $user_id
     * @return AuthAssignment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($item_name, $user_id)
    {
        if (($model = AuthAssignment::findOne(['item_name' => $item_name, 'user_id' => $user_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
