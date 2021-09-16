<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\TaskForm;

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
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
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
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
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
        //  $data= Yii::$app->db->createCommand("SELECT * FROM blog")->queryAll();
        //    print_r($data);

        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */


    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $string1 = Yii::$app->request->post('ContactForm')['str1'];
            $string2 = Yii::$app->request->post('ContactForm')['str2'];
            $action = Yii::$app->request->post('ContactForm')['action'];
            $string1_length = strlen($string1);
            $string2_length = strlen($string2);
            $result =  Yii::$app->taskcomponent->actiondistance($string1, $string2, $action); // calling fuction
            $string1 = "string One = " . $string1;
            $string2 = "string Two = " . $string2;
            $finalResult = $string1 . "<br>" . $string2 . "<br>" . $result;
            Yii::$app->session->setFlash('success', $finalResult);
            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionTask()
    {
        $model = new TaskForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $name = Yii::$app->request->post('TaskForm')['name'];
            $email = Yii::$app->request->post('TaskForm')['email'];
            $msg = Yii::$app->request->post('TaskForm')['msg'];

            $dataSave = Yii::$app->db->createCommand("  INSERT INTO taskform ( `name`, `email`, `msg`) VALUES ('$name', '" . $email . "', '" . $msg . "')")->query();

            if (!$dataSave) {
                Yii::$app->session->setFlash('danger', "form  not submitted ");

                return $this->refresh();
            } else {
                Yii::$app->session->setFlash('success', "form submitted ");
            }
        }
        return $this->render('task', [
            'model' => $model,
        ]);
    }
}
