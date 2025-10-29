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
                        <h2>Savatcha</h2>
                        <ul class="breadcrumb-menu list-style">
                            <li><a href="<?= yii\helpers\Url::home() ?>">Asosiy </a></li>
                            <li>Savatcha</li>
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
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="cart-table">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th scope="col">Product</th>
                                                    <th scope="col">Price</th>
                                                    <th scope="col">Quantity</th>
                                                    <th scope="col">Subtotal</th>
                                                    <th scope="col">Remove</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="product_img-wrap">
                                                                <div class="checkbox style2">
                                                                    <input type="checkbox" id="test_1">
                                                                    <label for="test_1"></label>
                                                                </div>
                                                                <div class="product_img">
                                                                    <img src="/img/products/product-thumb-1.png"
                                                                         alt="Image">
                                                                </div>
                                                                <div class="product_info">
                                                                    <h4><a href="shop-details.html">Organic Eggplant</a>
                                                                    </h4>
                                                                    <div class="ratings">
                                                                        <ul class="list-style">
                                                                            <li><i class="flaticon-star-2"></i></li>
                                                                            <li><i class="flaticon-star-2"></i></li>
                                                                            <li><i class="flaticon-star-2"></i></li>
                                                                            <li><i class="flaticon-star-2"></i></li>
                                                                            <li><i class="flaticon-star-1"></i></li>
                                                                        </ul>
                                                                        <span>(5)</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <p class="cart-item-price">$58/kg</p>
                                                        </td>
                                                        <td>
                                                            <div class="product-quantity">
                                                                <div class="qtySelector">
                                                                <span class="decreaseQty">
                                                                    <i class="ri-arrow-down-s-line"></i>
                                                                </span>
                                                                    <input type="text" class="qtyValue" value="1">
                                                                    <span class="increaseQty">
                                                                    <i class="ri-arrow-up-s-line"></i>
                                                                </span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <p class="cart-item-price">$58</p>
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
                                    <div class="col-lg-12 mt-2">
                                        <div class="cart-total">
                                            <h3 class="cart-box-title">Checkout Summary</h3>
                                            <div class="cart-total-item style2">
                                                <p>Subtotal</p>
                                                <span>$463</span>
                                            </div>
                                            <div class="cart-total-item style2">
                                                <p>Shipping</p>
                                                <span><b>$30</b></span>
                                            </div>
                                            <div class="cart-total-item">
                                                <p>Estimate For</p>
                                                <span><b>United States</b></span>
                                            </div>
                                            <div class="cart-total-item style2">
                                                <p>Total</p>
                                                <span>$450</span>
                                            </div>
                                            <a href="checkout.html" class="btn style1 d-block w-100">Proceed To
                                                Checkout</a>
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