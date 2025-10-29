<?php
use frontend\widgets\ProfileSidebr;
use yii\bootstrap5\ActiveForm;
$this->title = "Ma'lumtlarni tahrirlash";
?>
<!-- Content Wrapper Start -->
<div class="content-wrapper">

    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap bg-f br-1">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-7 col-sm-8">
                    <div class="breadcrumb-title">
                        <h2>Ma'lumotlarimni tahrirlash</h2>
                        <ul class="breadcrumb-menu list-style">
                            <li><a href="<?=yii\helpers\Url::home()?>">Asosiy </a></li>
                            <li>Tahrirlash</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-5 col-sm-4">
                    <div class="breadcrumb-img">
                        <img src="/img/breadcrumb/breadcrumb-img-5.png" alt="Image">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop section start -->
    <div class="shop-wrap ptb-100">
        <div class="container">
            <div class="row">
                <?=ProfileSidebr::widget()?>
                
                <div class="col-xxl-9 col-xl-8 col-lg-12 order-xl-2 order-lg-1 order-md-1 order-1">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="login-form-wrap">
                                <div class="login-header">
                                    <h3>Ma'lumotlarimni tahrirlash</h3>
                                </div>
                                    <div class="login-body">
                                    <?php $form = ActiveForm::begin([
                                        'class' => 'form-wrap',
                                    ]); ?>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <?= $form->field($user, 'first_name')->textInput([
                                                        'placeholder' => 'Ism',
                                                        'value' => $user->first_name??'',
                                                    ])->label(false) ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <?= $form->field($user, 'last_name')->textInput([
                                                        'placeholder' => 'Familya',
                                                        'value' => $user->last_name??'',
                                                    ])->label(false) ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <?= $form->field($user, 'email')->textInput([
                                                        'placeholder' => 'Email',
                                                        'value' => $user->email??'',
                                                    ])->label(false) ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <?= $form->field($user, 'phone')->textInput([
                                                        'placeholder' => 'Telefon raqami',
                                                        'value' => $user->phone??'',
                                                    ])->label(false) ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <button class="btn style1">
                                                        Tahrirlash 
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    <?php ActiveForm::end(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop section end -->

</div>
<!-- Content Wrapper End -->
<?php
$js = <<<JS
    $('#user-phone').inputmask("+998 (99) 999-99-99");
JS;

$this->registerJs($js,yii\web\View::POS_END);
?>