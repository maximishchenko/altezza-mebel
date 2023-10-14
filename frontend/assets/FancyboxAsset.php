<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class FancyboxAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        '/libs/fancybox/fancybox.css',
    ];
    public $js = [
        '/libs/fancybox/fancybox.umd.js',
    ];
    public $depends = [
    ];
    public $cssOptions = [
        'media' => "print",
        'onload' => "this.media='all'; this.onload = null",
    ];
}
