<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'libs/swiper/swiper.min.css',
        'libs/Choices/public/assets/styles/choices.min.css',
        'libs/SwipeAxisXCarousel/css/SwipeAxisXCarousel.min.css',
        'libs/graph-modal/dist/graph-modal.min.css',
        'css/style.css',
    ];
    public $js = [
        'libs/swiper/swiper.min.js',
        'libs/hc-sticky-2.2.7/dist/hc-sticky.js',
        'libs/Choices/public/assets/scripts/choices.min.js',
        'libs/SwipeAxisXCarousel/js/SwipeAxisXCarousel.min.js',
        'libs/graph-modal/dist/graph-modal.min.js',
        'js/PhoneMaskInputRus.min.js',
        'js/slider.js',
        'js/sidebar.js',
        'js/select.js',
        "js/catalog-slider.js",
        'js/modal.js',
        'js/main.js',
        'js/app.js',
    ];
    public $depends = [
    ];
    public $jsOptions = [
        'position' => \yii\web\View::POS_HEAD,
        'defer' => 'defer',
    ];
}
