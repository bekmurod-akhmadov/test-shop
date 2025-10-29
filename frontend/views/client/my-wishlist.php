<?php

use frontend\widgets\ProfileSidebr;
use yii\bootstrap5\ActiveForm;

$this->title = "Yoqtirganlarim";
?>
<!-- Content Wrapper Start -->
<div class="content-wrapper">

    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap bg-f br-1">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-7 col-sm-8">
                    <div class="breadcrumb-title">
                        <h2>Yoqtirganlarim</h2>
                        <ul class="breadcrumb-menu list-style">
                            <li><a href="<?= yii\helpers\Url::home() ?>">Asosiy </a></li>
                            <li>Yoqtirganlarim</li>
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
                <?= ProfileSidebr::widget() ?>

                <div class="col-xxl-9 col-xl-8 col-lg-12 order-xl-2 order-lg-1 order-md-1 order-1">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="container">
                                <div class="row gx-5">
                                    <div class="col-xl-12">
                                        <div class="cart-table">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th scope="col">Product</th>
                                                    <th scope="col">Price</th>
                                                    <th scope="col">Stock Status</th>
                                                    <th scope="col">Subtotal</th>
                                                    <th scope="col">Remove</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="product_img-wrap">
                                                                <div class="product_img">
                                                                    <img src="/img/products/product-thumb-1.png"
                                                                         alt="Image">
                                                                </div>
                                                                <div class="product_info">
                                                                    <h4><a href="shop-details.html">Organic Eggplant</a>
                                                                    </h4>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <p class="cart-item-price"><span class="discount">$70</span>$58/kg
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <p>In Stock</p>
                                                        </td>
                                                        <td>
                                                            <a href="cart.html" class="btn style1">Add To Cart<i
                                                                        class="flaticon-shopping-cart"></i></a>
                                                        </td>
                                                        <td>
                                                            <button class="cart-action" type="button">
                                                                <i class="ri-delete-bin-6-line"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
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