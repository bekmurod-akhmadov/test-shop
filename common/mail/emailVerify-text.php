<?php
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Client $user */

$verifyLink = Yii::$app->urlManager->createAbsoluteUrl(['client/confirm', 'email' => $user->email, 'code' => $user->confirmation_code]);
?>

<div style="font-family: Arial, sans-serif; padding: 20px;">
    <h2>Assalomu alaykum, <?= Html::encode($user->username) ?>!</h2>
    
    <p>Ro'yxatdan o'tganingiz uchun rahmat. Emailingizni tasdiqlash uchun quyidagi linkni bosing:</p>
    
    <p>
        <a href="<?= $verifyLink ?>" style="background-color: #4CAF50; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; display: inline-block;">
            Emailni tasdiqlash
        </a>
    </p>
    
    <p style="color: #666; font-size: 12px; margin-top: 30px;">
        Agar siz bu so'rovni yubormaganingiz bo'lsa, bu xatni e'tiborsiz qoldiring.
    </p>
</div>