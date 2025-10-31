<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\LoginForm;
use frontend\models\RegisterForm;
use common\models\Client;
use common\models\Address;
use frontend\models\SignupForm;

class ClientController extends Controller
{
    public function actionLogin()
    {
        if(!Yii::$app->user->isGuest){
            return $this->redirect('profile');
        }
        
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
        if(!Yii::$app->user->isGuest){
            return $this->redirect('profile');
        }
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

        $userId = Yii::$app->user->id;
        $user = Client::findOne($userId);
        $addresses = Address::find()->where(['client_id' => $userId])->all();

        return $this->render('profile', [
            'user' => $user,
            'addresses' => $addresses
        ]);
    }

    public function actionSettings()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('login');
        }

        $userId = Yii::$app->user->id;
        $user = Client::findOne($userId);
        $signUp = new SignupForm();

        $oldEmail = $user->email;

        if ($user->load(Yii::$app->request->post()) && $user->save()) {
            if ($oldEmail !== $user->email && $user->validate()) {
                if ($signUp->sendEmail($user)) {
                    Yii::$app->session->setFlash('success', 'Email o‘zgardi va tasdiqlash xati yuborildi.');
                } else {
                    Yii::$app->session->setFlash('error', 'Email o‘zgardi, ammo tasdiqlash xati yuborilmadi.');
                }
            } else {
                Yii::$app->session->setFlash('success', 'Maʼlumotlar tahrirlandi.');
            }

            return $this->redirect('profile');
        }

        return $this->render('settings', [
            'user' => $user
        ]);
    }


    public function actionAddAddress()
    {
        if(Yii::$app->user->isGuest){
            return $this->redirect('login');
        }
        $model = new Address();
        $userId = Yii::$app->user->id;
        $model->client_id = $userId;
        if ($model->load(Yii::$app->request->post())) {
            $model->client_id = $userId;
            $model->save();
            return $this->redirect('profile');
        }
        return $this->render('add-address', [
            'model' => $model
        ]);
    }

    public function actionMyOrders()
    {
        if(Yii::$app->user->isGuest){
            return $this->redirect('login');
        }

        return $this->render('my-orders');
    }

    public function actionLogout(){
        Yii::$app->user->logout();
        return $this->goHome();
    }
}