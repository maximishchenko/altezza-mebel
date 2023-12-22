<?php

namespace backend\assets;

use yii\web\AssetBundle;

class NpmAsset extends AssetBundle
{
    public $sourcePath = '@npm';
    public $css = [
        'fancyapps--ui/dist/fancybox/fancybox.css',
    ];
    public $js = [
        'fancyapps--ui/dist/fancybox/fancybox.umd.js',
    ];
    public $depends = [
    ];
    public $jsOptions = [
         'position' => \yii\web\View::POS_HEAD,
         'defer' => 'defer',
    ];
    public $cssOptions = [
        'media' => "print",
        'onload' => "this.media='all'; this.onload = null",
    ];
}
