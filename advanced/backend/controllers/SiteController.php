<?php
namespace backend\controllers;

use backend\models\AddProductForm;
use backend\models\AddAdminForm;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

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
                        'actions' => ['login', 'error', 'add-product', 'add-admin'],
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

//    public function admin()
//    {
//        if ($_)
//    }

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

    public function actionAddProduct()
    {
        $model = new AddProductForm();
        if ($model->load(Yii::$app->request->post()) && $model->addProduct()) {
            Yii::$app->session->setFlash('success', 'Товар успешно добавлен в каталог.');
            return $this->goHome();
        }

        return $this->render('add-product', [
            'model' => $model,
        ]);
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */

    public function actionAddAdmin()
    {
        $model = new AddAdminForm();
        if ($model->load(Yii::$app->request->post()) && $model->addAdmin()) {
            Yii::$app->session->setFlash('success', 'Новый администратор успешно добавлен!');
            return $this->goHome();
        }

        return $this->render('add-admin', [
            'model' => $model,
        ]);
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->loginAdmin()) {
            return $this->goBack();
        } else {
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
