<?php

use yii\widgets\Pjax;

?>
<!-- Header Section Start -->
<header class="header-wrap style1">
    <div class="header-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="header-top-left">
                        <p>Get 10% Discount For Your First Shipping</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="header-top-right">
                        <div class="select-lang">
                            <i class="ri-global-line"></i>
                            <div class="navbar-option-item navbar-language dropdown language-option">
                                <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                    <span class="lang-name"></span>
                                </button>
                                <div class="dropdown-menu language-dropdown-menu">
                                    <a class="dropdown-item" href="#">
                                        <img src="/img/uk.png" alt="flag">
                                        Eng
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <img src="/img/china.png" alt="flag">
                                        简体中文
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <img src="/img/uae.png" alt="flag">
                                        العربيّة
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="select-currency">
                            <i class="ri-money-dollar-circle-line"></i>
                            <select name="currency" id="currency">
                                <option value="1">USD</option>
                                <option value="2">EUR</option>
                                <option value="3">CAD</option>
                            </select>
                        </div>
                        <div class="user-menu">

                            <span><img src="/img/user.jpg"
                                       alt="Image"><?= Yii::$app->user->isGuest ? 'Mijoz' : Yii::$app->user->identity->username ?></span>
                            <ul class="list-style">
                                <li><a href="<?= yii\helpers\Url::to(['client/profile']) ?>">Profil</a></li>
                                <li><a href="<?= yii\helpers\Url::to(['cart/index']) ?>">Savatcha</a></li>
                                <li><a href="wishlist.html">Yoqtirganlarim</a></li>
                                <?php if (!Yii::$app->user->isGuest) { ?>
                                    <li><a href="<?= yii\helpers\Url::to(['client/logout']) ?>">Chiqish</a></li>
                                <?php } else { ?>
                                    <li><a href="<?= yii\helpers\Url::to(['client/login']) ?>">Kirish</a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-center lg-none">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xxl-2 col-xl-3">
                    <a class="navbar-brand" href="<?= yii\helpers\Url::home() ?>">
                        <img src="/img/logo.png" alt="logo">
                    </a>
                </div>
                <div class="col-xxl-8 col-xl-6">
                    <form action="#" class="search-box">
                        <input type="search" placeholder="Search Your Item Here..">
                        <button type="submit"><i class="flaticon-search"></i></button>
                    </form>
                </div>
                <div class="col-xxl-2 col-xl-3">

                    <div class="user-option">
                        <div class="shopcart" id="cart-icon">
                            <i class="flaticon-shopping-cart"></i>
                            <span class="cart-count"><?=common\components\StaticFunctions::getCartCount()?? '0' ?></span>
                        </div>
                        <a class="wishlist-btn" href="wishlist.html">
                            <i class="flaticon-heart-1"></i>
                            <span class="wishlist-count"><?=common\components\StaticFunctions::getWishlistCount()?? '0' ?></span>
                        </a>
                        <a class="compare-btn" href="compare.html">
                            <i class="flaticon-compare"></i>
                            <span>1</span>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom">
        <div class="container">
            <div class="others-options xl-none">
                <button type="button" class="close-option"><i class="ri-close-line"></i></button>
                <ul class="contact-info list-style">
                    <li><i class="flaticon-phone-call"></i><a href="tel:70033344555">+(700) 333 44 555</a></li>
                    <li><i class="flaticon-email-2"></i><a
                                href="https://templates.envytheme.com/cdn-cgi/l/email-protection#c0a9aea6af80b2afa1aeeea3afad"><span
                                    class="__cf_email__" data-cfemail="157c7b737a55677a747b3b767a78">[email&#160;protected]</span></a>
                    </li>
                </ul>
            </div>
            <nav class="navbar navbar-expand-md">
                <a class="navbar-brand xl-none" href="index.html">
                    <img src="/img/logo.png" alt="logo">
                </a>
                <div class="collapse navbar-collapse main-menu-wrap" id="navbarSupportedContent">
                    <div class="menu-close xl-none">
                        <a href="javascript:void(0)"> <i class="ri-close-line"></i></a>
                    </div>
                    <ul class="navbar-nav me-auto">

                        <li class="nav-item">
                            <a href="<?= yii\helpers\Url::home() ?>" class="nav-link">Asosiy</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= yii\helpers\Url::to(['product/index']) ?>" class="nav-link">Mahsulotlar</a>
                        </li>

                        <li class="nav-item">
                            <a href="<?= yii\helpers\Url::to(['product/discount']) ?>" class="nav-link">Aksiyadagi
                                mahsulotlar</a>
                        </li>


                    </ul>
                    <div class="others-options lg-none">
                        <ul class="contact-info list-style">
                            <li><i class="flaticon-phone-call"></i><a href="tel:70033344555">+(700) 333 44 555</a></li>
                            <li><i class="flaticon-email-2"></i><a
                                        href="https://templates.envytheme.com/cdn-cgi/l/email-protection#fb92959d94bb89949a95d5989496"><span
                                            class="__cf_email__" data-cfemail="51383f373e11233e303f7f323e3c">[email&#160;protected]</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="mobile-bar-wrap">
                <div class="mobile-menu xl-none">
                    <a href="javascript:void(0)"><i class="ri-menu-line"></i></a>
                </div>
            </div>
            <div class="user-option xl-none">
                <button class="searchbtn" type="button">
                    <i class="flaticon-search"></i>
                </button>
                <button class="sidebar-btn" type="button">
                    <i class="ri-equalizer-line"></i>
                </button>
                <button class="shopcart" type="button">
                    <i class="flaticon-shopping-cart"></i>
                    <span>1</span>
                </button>
                <a class="wishlist-btn" href="wishlist.html">
                    <i class="flaticon-heart-1"></i>
                    <span>1</span>
                </a>
                <a class="compare-btn" href="compare.html">
                    <i class="flaticon-compare"></i>
                    <span>1</span>
                </a>
            </div>
        </div>
    </div>
    <div class="search-area">
        <div class="container">
            <button type="button" class="close-searchbox">
                <i class="ri-close-line"></i>
            </button>
            <form action="#">
                <div class="form-group">
                    <input type="search" placeholder="Search Here" autofocus>
                </div>
            </form>
        </div>
    </div>
</header>

<div class="cart-popup">
    <button type="button" class="close-cart-popup"><i class="ri-close-fill"></i></button>
    <div id="cart-modal">
        
    </div>

</div>

<style>
.toast-success {
    background-color: #28a745 !important; /* bg-success */
    color: #fff !important;
    opacity: 100%;
}

.toast-error {
    background-color: #dc3545 !important; /* bg-danger */
    color: #fff !important;
}

.toast-info {
    background-color: #17a2b8 !important; /* bg-info */
    color: #fff !important;
}

.toast-warning {
    background-color: #ffc107 !important; /* bg-warning */
    color: #212529 !important;
}

#toast-container {
    top: 150px !important; /* Toastrni pastroqqa tushiradi */
}
</style>
