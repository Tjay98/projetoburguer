<?php

namespace backend\controllers;

use app\models\ingrediente;
use Yii;
use app\models\Hamburguer;
use backend\models\HamburguerSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * HamburgerController implements the CRUD actions for Hamburger model.
 */
class HamburguerController extends Controller
{

    const precision = 2;
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
        if((Yii::$app->user->can('view-admin'))||(Yii::$app->user->can('funcionario'))) {
            $searchModel = new HamburguerSearch();
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


        if((Yii::$app->user->can('view-admin'))||(Yii::$app->user->can('funcionario'))) {
            $model = $this->findModel($id);
            $pao = $this->findModelI($model->pao);

            $molho = Ingrediente::find()
                ->where(['id' => $model->molho])
                ->one();

            $carne = Ingrediente::find()
                ->where(['id' => $model->carne])
                ->one();

            $vegetais = Ingrediente::find()
                ->where(['id' => $model->vegetais])
                ->one();

            $queijo = Ingrediente::find()
                ->where(['id' => $model->queijo])
                ->one();

            $complemento = Ingrediente::find()
                ->where(['id' => $model->complemento])
                ->one();

            return $this->render('view', [
                'model' => $model,
                'pao'=> $pao,
                'carne'=> $carne,
                'molho'=>$molho,
                'vegetais'=> $vegetais,
                'queijo'=>$queijo,
                'complemente'=> $complemento,
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
            $model = new Hamburguer();

            if (($model->load(Yii::$app->request->post()))) {

                $model->imagem=UploadedFile::getInstance($model,'imagem');
                $imagem=$model->nome.'.'.$model->imagem->extension;
                $image_path='imagens/hamburguers/'.$imagem;
                $model->imagem->saveAs($image_path);
                $model->imagem=$image_path;


                $precoteste= Ingrediente::find()
                    ->where(['id'=> $model->pao])
                    ->orWhere(['id'=> $model->carne])
                    ->orWhere(['id'=> $model->molho])
                    ->orWhere(['id'=> $model->vegetais])
                    ->orWhere(['id' => $model->queijo])
                    ->orWhere(['id' => $model->complemento])
                    ->asArray()
                    ->sum('preco');

//                if(empty($model->molho)){
//                    $model->molho=0;
//                }
//
//                if(empty($model->vegetais)){
//                    $model->vegetais=0;
//                }
//
//                if(empty($model->queijo)){
//                    $model->queijo=0;
//                }
//
//                if(empty($model->complemento)){
//                    $model->complemento=0;
//                }

                $model->preco= $precoteste;

                $model->save(false);
                return $this->redirect(['view', 'id' => $model->id]);
            }

            $pao = Ingrediente::find()
                ->where(['tipo' => 1])
                ->all();

            $molho = Ingrediente::find()
                ->where(['tipo' => 2])
                ->all();

            $carne = Ingrediente::find()
                ->where(['tipo' => 3])
                ->all();

            $vegetais = Ingrediente::find()
                ->where(['tipo' => 4])
                ->all();

            $queijo = Ingrediente::find()
                ->where(['tipo' => 5])
                ->all();

            $complemento = Ingrediente::find()
                ->where(['tipo' => 6])
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
            $current_image=$model->imagem;
            if ($model->load(Yii::$app->request->post())) {
                $imageUpload=UploadedFile::getInstance($model,'imagem');
                if(!empty($imageUpload)&&$imageUpload !==0){
                    $imageUpload->saveAs('imagens/hamburguers/'.$model->nome.$imageUpload->extension);
                    //método mágico
                    $model->imagem= 'imagens/hamburguers/'.$model->nome.$imageUpload->extension;

                }
                else{
                    $model->imagem=$current_image;
                }



                $model->save(false);
                return $this->redirect(['view', 'id' => $model->id]);
            }

            $pao = Ingrediente::find()
                ->where(['tipo' => 1])
                ->all();

            $molho = Ingrediente::find()
                ->where(['tipo' => 2])
                ->all();

            $carne = Ingrediente::find()
                ->where(['tipo' => 3])
                ->all();

            $vegetais = Ingrediente::find()
                ->where(['tipo' => 4])
                ->all();

            $queijo = Ingrediente::find()
                ->where(['tipo' => 5])
                ->all();

            $complemento = Ingrediente::find()
                ->where(['tipo' => 6])
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
            $hamburguer = Hamburguer::findOne($id);
            unlink(Yii::$app->basePath . '/web/' . $hamburguer->imagem);
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
        if (($model = Hamburguer::findOne($id)) !== null) {

            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    protected function findModelI($id)
    {
        if (($model = ingrediente::findOne($id)) !== null) {

            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
