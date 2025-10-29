<?php
use frontend\widgets\ProfileSidebr;
$this->title = "Profil";
?>
<!-- Content Wrapper Start -->
<div class="content-wrapper">

    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap bg-f br-1">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-7 col-sm-8">
                    <div class="breadcrumb-title">
                        <h2>Mening ma'lumotlarim</h2>
                        <ul class="breadcrumb-menu list-style">
                            <li><a href="<?=yii\helpers\Url::home()?>">Asosiy </a></li>
                            <li>Profil</li>
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
                                        <h3>Ma'lumotlarim</h3>
                                    </div>
                                    <div class="login-body">
                                        <div class="row">
                                            <table  class="table table-bordered">
                                                <tr>
                                                    <td>Full Name</td>
                                                    <td><?=Yii::$app->user->identity->last_name . ' ' . Yii::$app->user->identity->first_name ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Phone</td>
                                                    <td><?=Yii::$app->user->identity->phone?></td>
                                                </tr>
                                                <tr>
                                                    <td>Email</td>
                                                    <td><?=Yii::$app->user->identity->email?></td>
                                                </tr>
                                            </table>   
                                            <a href="<?=yii\helpers\Url::to(['client/settings'])?>" class="btn style1">Tahrirlash</a>   
                                            
                                            <h3 class="mt-5">Mening manzillarim</h3>
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th>Viloyat</th>
                                                    <th>Tuman</th>
                                                    <th>Manzil</th>
                                                </tr>
                                                <?php foreach ($addresses as $address): ?>
                                                    <tr>
                                                        <td><?=$address->city?></td>
                                                        <td><?=$address->district?></td>
                                                        <td><?=$address->address?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </table>
                                            <a href="<?=yii\helpers\Url::to(['client/add-address'])?>" class="btn style1">Manzil qo'shish</a>
                                        </div>
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