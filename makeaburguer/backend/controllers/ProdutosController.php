<?php

namespace backend\controllers;

use app\models\Categoria;
use app\models\Menu;
use Yii;
use app\models\Produtos;
use backend\models\ProdutosSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ProdutosController implements the CRUD actions for Produtos model.
 */
class ProdutosController extends Controller
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
     * Lists all Produtos models.
     * @return mixed
     */
    public function actionIndex()
    {
        if((Yii::$app->user->can('view-admin'))||(Yii::$app->user->can('funcionario'))) {
            $searchModel = new ProdutosSearch();
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
     * Displays a single Produtos model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if((Yii::$app->user->can('view-admin'))||(Yii::$app->user->can('funcionario'))) {
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
     * Creates a new Produtos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can('create-admin')) {
            $model = new Produtos();

            if ($model->load(Yii::$app->request->post())) {

                $model->imagem=UploadedFile::getInstance($model,'imagem');
                $imagem=$model->nome.'.'.$model->imagem->extension;
                $image_path='imagens/produtos/'.$imagem;
                $model->imagem->saveAs($image_path);
                $model->imagem=$image_path;

                $model->save(false);

                return $this->redirect(['view', 'id' => $model->id]);
            }

            $categoria = Categoria::find()
                ->where(['id' => 7])
                ->orWhere(['id' => 8])
                ->orWhere(['id' => 9])
                ->all();

            return $this->render('create', [
                'model' => $model,
                'categoria' => ArrayHelper::map($categoria, 'id', 'nome'),
            ]);
        }
        else
        {
            throw new ForbiddenHttpException();
        }
    }

    /**
     * Updates an existing Produtos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if(Yii::$app->user->can('update-detalhes-admin')) {
            $model = $this->findModel($id);
            $current_image=$model->imagem;
            if ($model->load(Yii::$app->request->post())) {

                $imageUpload=UploadedFile::getInstance($model,'imagem');
                if(!empty($imageUpload)&&$imageUpload !==0){
                    $imageUpload->saveAs('imagens/produtos/'.$model->nome.$imageUpload->extension);
                    //método mágico
                    $model->imagem= 'imagens/produtos/'.$model->nome.$imageUpload->extension;

                }
                else{
                    $model->imagem=$current_image;
                }


                $model->save(false);

                return $this->redirect(['view', 'id' => $model->id]);
            }
            $categoria = Categoria::find()
                ->where(['id' => 7])
                ->orWhere(['id' => 8])
                ->orWhere(['id' => 9])
                ->all();

            return $this->render('update', [
                'model' => $model,
                'categoria' => ArrayHelper::map($categoria, 'id', 'nome'),
            ]);
        }
        else
        {
            throw new ForbiddenHttpException();
        }
    }

    /**
     * Deletes an existing Produtos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if(Yii::$app->user->can('view-admin')) {
            $produto = Produtos::findOne($id);
            unlink(Yii::$app->basePath . '/web/' . $produto->imagem);
            $this->findModel($id)->delete();


            return $this->redirect(['index']);
        }
        else
        {
            throw new ForbiddenHttpException();
        }
    }

    /**
     * Finds the Produtos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Produtos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Produtos::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
