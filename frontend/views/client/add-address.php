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
                        <h2>Manzil qo'shish</h2>
                        <ul class="breadcrumb-menu list-style">
                            <li><a href="<?=yii\helpers\Url::home()?>">Asosiy </a></li>
                            <li>Manzil qo'shish</li>
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
                                    <h3>Manzil qo'shish</h3>
                                </div>
                                    <div class="login-body">
                                    <?php $form = ActiveForm::begin([
                                        'class' => 'form-wrap',
                                    ]); ?>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <?= $form->field($model, 'city')->textInput([
                                                        'placeholder' => 'Shahar',
                                                    ])->label(false) ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <?= $form->field($model, 'district')->textInput([
                                                        'placeholder' => 'Tumanni kiriting',
                                                    ])->label(false) ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <?= $form->field($model, 'address')->textInput([
                                                        'placeholder' => 'Manzil',
                                                    ])->label(false) ?>
                                                </div>
                                            </div>
                                        
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <button class="btn style1">
                                                        Saqlash 
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