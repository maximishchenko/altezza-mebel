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
        'css/backend.css',
        'css/sortable.css',
    ];
    public $js = [
        'js/jquery-ui.js',
        // 'js/sortable.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];    
    public $jsOptions = [
        'position'=>\yii\web\View::POS_HEAD
    ];
}
