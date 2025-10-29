<?php


namespace frontend\models;
use common\models\Client;

use Yii;
use yii\base\Model;

class RegisterForm extends Model
{
    public $username;
    public $password;
    public $confirm_password;
    public $email;
    public $phone;

    public function rules()
    {
        return [
            [['username','password','confirm_password','email'],'required'],
            ['username','string','min' => 3,'max' => 255],
            ['username','unique','targetClass'=> '\common\models\Client'],
            ['password','string','min' => 8,'max' => 16],
            ['confirm_password','string','min' => 8,'max' => 16],
            ['confirm_password','compare','compareAttribute'=>'password','message'=>'Parollar mos emas'],
            ['email','email'],
            ['email','unique','targetClass'=> '\common\models\Client'],
        ];
    }

    public function attributeLabels(){

        return [
            'username' => 'Username',
            'password' => 'Password',
            'confirm_password' => 'Confirm Password',
            'email' => 'Email',
        ];

    }

    public function register()
    {
        if (!$this->validate()) {
            return null;
        }

        $model = new Client();
        $model->username = $this->username;
        $model->email = $this->email;
        $model->phone = $this->phone;
        $model->password = Yii::$app->security->generatePasswordHash($this->password);
        $model->status = Client::STATUS_INACTIVE;

        $confirmationCode = random_int(1000, 9999);
        $model->confirmation_code = $confirmationCode;

        if ($model->save()) {
            if ($this->sendEmail($model)) {
                return true;
            } else {
               return false;
            }
        }

        return false;
    }



    protected function sendEmail($model): bool
{
    try {
        $mailer = Yii::$app->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $model]
            )
            ->setTo($model->email)
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setSubject('Tasdiqlash kodi');
        
        $result = $mailer->send();
        
        if ($result) {
            return true;
        } else {
            return false;
        }
        
    } catch (\Throwable $e) {
        Yii::error('Email yuborishda xatolik: ' . $e->getMessage() . ' | Trace: ' . $e->getTraceAsString(), __METHOD__);
        return false;
    }
}

}