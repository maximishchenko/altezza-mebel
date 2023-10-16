<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class NpmAsset extends AssetBundle
{
    public $sourcePath = '@npm';
    public $css = [
        'swiper/swiper-bundle.min.css',
        'choices.js/public/assets/styles/choices.min.css',
    ];
    public $js = [
        'swiper/swiper-bundle.min.js',
        'choices.js/public/assets/scripts/choices.min.js',
        'hc-sticky/dist/hc-sticky.js',

    ];
    public $depends = [
    ];
    public $jsOptions = [
        // 'position' => \yii\web\View::POS_HEAD,
        // 'defer' => 'defer',
    ];
}
