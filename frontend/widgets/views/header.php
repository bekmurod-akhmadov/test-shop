<?php
?>
<!-- Header Section Start -->
<header class="header-wrap style1">
    <div class="header-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="header-top-left">

                        <p><?= Yii::t('app', 'Hello world') ?></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="header-top-right">
                        <div class="select-lang">
                            <a href="<?= yii\helpers\Url::to(['/site/language', 'lang' => 'uz']) ?>">O'zbekcha</a>
                            <a href="<?= yii\helpers\Url::to(['/site/language', 'lang' => 'ru']) ?>">Русский</a>
                        </div>
                        <div class="user-menu">

                            <span><img src="/img/user.jpg"
                                       alt="Image"><?= Yii::$app->user->isGuest ? 'Mijoz' : Yii::$app->user->identity->username ?></span>
                            <ul class="list-style">
                                <li><a href="<?= yii\helpers\Url::to(['client/profile']) ?>"><?= Yii::t('app', 'Profile') ?></a></li>
                                <li><a href="<?= yii\helpers\Url::to(['client/my-orders']) ?>"><?= Yii::t('app', 'Buyurtmalarim') ?></a></li>
                                <li><a href="<?= yii\helpers\Url::to(['cart/index']) ?>"><?= Yii::t('app', 'Savatcha') ?></a></li>
                                <li><a href="<?= yii\helpers\Url::to(['cart/wishlist']) ?>"><?= Yii::t('app', 'Yoqtirganlarim') ?></a></li>
                                <?php if (!Yii::$app->user->isGuest) { ?>
                                    <li><a href="<?= yii\helpers\Url::to(['client/logout']) ?>"><?= Yii::t('app', 'Chiqish') ?></a></li>
                                <?php } else { ?>
                                    <li><a href="<?= yii\helpers\Url::to(['client/login']) ?>"><?= Yii::t('app', 'Kirish') ?></a></li>
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
                        <input type="search" placeholder="<?=Yii::t('app', 'Qidirish') ?>">
                        <button type="submit"><i class="flaticon-search"></i></button>
                    </form>
                </div>
                <div class="col-xxl-2 col-xl-3">

                    <div class="user-option">
                        <div class="shopcart" id="cart-icon">
                            <i class="flaticon-shopping-cart"></i>
                            <span class="cart-count"><?=common\components\StaticFunctions::getCartCount()?? '0' ?></span>
                        </div>
                        <a class="wishlist-btn" href="<?= yii\helpers\Url::to(['cart/wishlist']) ?>">
                            <i class="flaticon-heart-1"></i>
                            <span class="wishlist-count"><?=common\components\StaticFunctions::getWishlistCount()?? '0' ?></span>
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
                            <a href="<?= yii\helpers\Url::home() ?>" class="nav-link"><?= Yii::t('app', 'Asosiy') ?></a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= yii\helpers\Url::to(['product/index']) ?>" class="nav-link"><?= Yii::t('app', 'Mahsulotlar') ?></a>
                        </li>

                        <li class="nav-item">
                            <a href="<?= yii\helpers\Url::to(['product/discount']) ?>" class="nav-link"><?= Yii::t('app', 'Aksiyadagi mahsulotlar') ?></a>
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
