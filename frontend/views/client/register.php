<?php 
$this->title = "Ro'yatdan o'tish";
use yii\bootstrap5\ActiveForm;

?>
 <!-- Content Wrapper Start -->
<div class="content-wrapper">

    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap bg-f br-1">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-7 col-sm-8">
                <div class="breadcrumb-title">
                    <h2>Ro'yxatdan o'tish</h2>
                    <ul class="breadcrumb-menu list-style">
                        <li><a href="<?=yii\helpers\Url::home()?>">Asosiy </a></li>
                        <li>Ro'yxatdan o'tish</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-5 col-sm-4">
                <div class="breadcrumb-img">
                    <img src="assets/img/breadcrumb/breadcrumb-img-4.png" alt="Image">
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Account Section start -->
    <section class="Login-wrap pt-100 pb-75">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-6 offset-lg-3">
                    <div class="login-form-wrap">
                        <div class="login-header">
                            <h3>Ro'yxatdan o'tish</h3>
                        </div>
                        <div class="login-body">
                            <?php $form = ActiveForm::begin([
                                'class' => 'form-wrap',
                            ]); ?>
                            <div class="row">
                                <div class="col-lg-12">
                                        <div class="form-group">
                                            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <?= $form->field($model, 'password')->passwordInput() ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <?= $form->field($model, 'confirm_password')->passwordInput() ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <button class="btn style1">
                                                Ro'yxatdan o'tish 
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-center">
                                        <p class="mb-0">Shaxsiy hisob orqali <a class="link style1" href="<?=yii\helpers\Url::toRoute(['client/login'])?>"> kirish</a></p>
                                    </div>
                                </div>
                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Account Section end -->

</div>
            <!-- Content Wrapper End -->
