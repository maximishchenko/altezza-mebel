<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        '/css/SwipeAxisXCarousel.min.css',
        '/css/graph-modal.min.css',
        '/css/style.css',
    ];
    public $js = [
        '/js/SwipeAxisXCarousel.js',
        '/js/graph-modal.min.js',
        '/js/PhoneMaskInputRus.min.js',
        '/js/slider.js',
        '/js/sidebar.js',
        '/js/select.js',
        "/js/catalog-slider.js",
        '/js/modal.js',
        '/js/main.js',
        '/js/app.js',
    ];
    public $depends = [
        'frontend\assets\NpmAsset',
    ];
    public $jsOptions = [
        // 'position' => \yii\web\View::POS_END,
        // 'defer' => 'defer',
    ];
}
