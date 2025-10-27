<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css",
        'https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css',
        'https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css',
        'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css',
        'https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css',
        'https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css',
        "https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css", 
        "css/adminlte.css",
    ];
    public $js = [
        "https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/js/jsvectormap.min.js",
        "https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/maps/world.js",
        "https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js",
        "https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js",
        "https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js",
        "https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js",
        "https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js",
        "js/adminlte.js",

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}
