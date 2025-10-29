<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\LoginForm;
use frontend\models\RegisterForm;
use common\models\Client;

class ClientController extends Controller
{
    public function actionLogin()
    {
        $model = new LoginForm();
        if($model->load(Yii::$app->request->post()) && $model->login()){
            return $this->redirect('profile');
        }
        return $this->render('login',[
            'model' => $model
        ]);
    }

    public function actionRegister()
    {
        $model = new RegisterForm();
        if($model->load(Yii::$app->request->post()) && $model->register()){
            Yii::$app->session->setFlash('success', 'Email tasdiqlash uchun link yuborildi');
            return $this->redirect('login');
        }
        return $this->render('register',[
            'model' => $model
        ]);
    }

    public function actionConfirm($email, $code)
    {
        $model = Client::findOne(['email' => $email]);
        if ($model && $model->confirmation_code == $code) {
            $model->confirmation_code = null;
            $model->status = Client::STATUS_ACTIVE;
            $model->save(false);

            Yii::$app->session->setFlash('success', 'Email tasdiqlandi');
            return $this->redirect('login');
        }
        Yii::$app->session->setFlash('error', 'Email tasdiqlanmadi');
        return $this->redirect('register');
    }

    public function actionProfile()
    {
    
        if(Yii::$app->user->isGuest){
            return $this->redirect('login');
        }

        return $this->render('profile');
    }

    public function actionLogout(){
        Yii::$app->user->logout();
        return $this->goHome();
    }
}