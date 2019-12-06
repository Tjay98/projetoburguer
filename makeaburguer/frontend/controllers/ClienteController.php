<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\User;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;

class ClienteController extends Controller
{

    public function actionInfo()
    {
//        return $this->render('info');
        $nomeuser=Yii::$app->user->identity->username;

        $id=User::find()
                ->select('id')
                ->where(['username'=>$nomeuser]);

        if(Yii::$app->user->can('utilizador')) {
            return $this->render('info', [
                'model' => $this->findModel($id),
            ]);
        }
        else{
            throw new ForbiddenHttpException();
        }
    }

    public function actionUpdate($id)
    {
        if(Yii::$app->user->can('utilizador')) {
            $nomeuser=Yii::$app->user->identity->username;

            //procurar o id do utilizador atraves do username
            $id=User::find()
                ->select('id')
                ->where(['username'=>$nomeuser]);

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
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}