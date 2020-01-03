<?php
namespace backend\controllers;

use app\models\Hamburguer;
use app\models\Cliente;
use app\models\Ingrediente;
use app\models\Pedido;
use app\models\Produtos;
use app\models\Menu;
use app\models\User;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use yii\web\ForbiddenHttpException;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */


    public function actionIndex()
    {
        if(Yii::$app->user->can('login-backoffice')) {
            //vais á base de dados e conta os campos abaixo para mostrar no index do backend
            $Hamburguer = Hamburguer::find()->count();
            $Cliente = User::find()->count();
            $Produtos = Produtos::find()->count();
            $Ingredientes = Ingrediente::find()->count();
            $Pedidos = Pedido::find()->count();
            $Menu= Menu::find()->count();

            return $this->render('index',
                [
                    'Hamburguer' => $Hamburguer,
                    'Cliente' => $Cliente,
                    'Produtos' => $Produtos,
                    'Ingredientes' => $Ingredientes,
                    'Pedidos' => $Pedidos,
                    'Menu'=>$Menu,
                ]
            );
        }
        else{
            //soluçao temporaria
            //o utilizador ao fazer login nao sendo admin leva logout e vai para a página inicial

            Yii::$app->user->logout();
            return $this->goHome();
        }
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }


}
