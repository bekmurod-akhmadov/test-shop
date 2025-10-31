<?php
$this->title = 'Rasmiylashtirish';
use yii\helpers\Url;
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
                                    <h2>Rasmiylashtirish</h2>
                                    <ul class="breadcrumb-menu list-style">
                                        <li><a href="<?=Url::to(['site/index'])?>">Asosiy </a></li>
                                        <li>Rasmiylashtirish</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-5 col-sm-4">
                                <div class="breadcrumb-img">
                                    <img src="/img/breadcrumb/breadcrumb-img-3.png" alt="Image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Breadcrumb End -->
                <!-- Checkout section start -->
                <div class="checkout-wrap pt-100 pb-75">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <img src="/default/ok.png" alt="">
                                <h2>Buyurtmangiz qabul qilindi</h2>
                                <p>Buyurtmangiz qabul qilindi.Tez orada operatorlarimiz siz bilan bog'lanishadi</p>
                                <a href="<?=Url::to(['product/index'])?>" class="btn style1">Haridni davom ettirish</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Checkout section end -->

            </div>
            <!-- Content Wrapper End -->