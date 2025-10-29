<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css",
        'css/bootstrap.min.css',
        'css/flaticon.css',
        'css/remixicon.css',
        'css/owl.carousel.min.css',
        'css/swiper-min.css',
        'css/magnific-popup.css',
        'css/fancybox.css',
        'css/jquery-ui-min.css',
        'css/aos.css',
        'css/style.css',
        'css/responsive.css',
    ];
    public $js = [
        "js/email-decode.min.js",
        'js/jquery.min.js',
        "https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.9/jquery.inputmask.min.js",
        'js/bootstrap.bundle.min.js',
        'js/form-validator.min.js',
        'js/contact-form-script.js',
        'js/aos.js',
        'js/owl.carousel.min.js',
        'js/swiper-min.js',
        'js/jquery-magnific-popup.js',
        'js/jquery-ui-min.js',
        'js/jquery.countdown.min.js',
        'js/fancybox.js',
        'js/mixitup.min.js',
        'js/jquery.appear.js',
        'js/tweenmax.min.js',
        'js/main.js',
        'js/custom.js',
    ];
    public $depends = [
        // 'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}
