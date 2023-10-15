<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'modules' => [
        'content' => [
            'class' => 'frontend\modules\content\Module',
        ],
        'seo' => [
            'class' => 'frontend\modules\seo\Module',
        ],
        'catalog' => [
            'class' => 'frontend\modules\catalog\Module',
        ],
    ],    
    'on beforeRequest' => function () {
        if (Yii::$app->configManager->getItemValue('isWebSiteOffline') == true) {
            Yii::$app->catchAll = [
              'site/offline', 
              'name' => "Обслуживание",
              'message' => "Производится обслуживание сайта"
            ];
        }
    },
    'components' => [
        'assetManager' => [
            'bundles' => YII_ENV_PROD ? require(__DIR__.'/assets-prod.php') : [],
            'linkAssets' => true,
            'appendTimestamp' => true,
        ],

        'request' => [
            'csrfParam' => '_csrf-frontend',
            'baseUrl' => '',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => \yii\log\FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'error/index',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'suffix' => '.html',
            'rules' => [
                [
                    'pattern' => 'sitemap', 
                    'route' => 'seo/sitemap/index', 
                    'suffix' => '.xml'
                ],                
                'page-not-found' => 'error/page-not-found',
                'index' => 'site/index',
                'policy' => 'site/policy',
                'offline' => 'site/offline',
                'catalog' => 'catalog/default/index',
                'catalog/<slug>' => 'catalog/default/view',
                'feedback' => 'site/feedback',
                'about' => 'site/about',
                'collaboration' => 'site/collaboration',
            ],
        ],
    ],
    'params' => $params,
];
