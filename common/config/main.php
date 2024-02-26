<?php
return [
    'name' => 'Altezza',
    'timezone'=> 'Europe/Moscow',
    'language' => 'ru-RU',

    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'bootstrap' => [
        'configManager',
        'queue',
    ],

    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'telegram' => [
            'class' => 'aki\telegram\Telegram',
            'botToken' => '',
        ],
        'queue' => [
            'class' => \yii\queue\file\Queue::class,
            'path' => '@console/runtime/queue',
            'as log' => \yii\queue\LogBehavior::class,
        ],
        'configManager' => [
            'class' => yii2tech\config\Manager::class,
            'autoRestoreValues' => true,
            'cacheDuration' => 3600,
            'storage' => [
                'class' => yii2tech\config\StoragePhp::class,
                'fileName' => "@frontend/runtime/app_config.php",
            ],
            'items' => [
                'contactPhone' => [
                    'path' => 'phone',
                    'label' => Yii::t('app', "CONTACT_PHONE"),
                    'description' => Yii::t('app', "CONTACT_PHONE DESCRIPTION"),
                    'value' => "8-800-222-00-26",
                    'rules' => [
                        ['required']
                    ],
                    'inputOptions' => [
                        'type' => 'phone',
                    ],
                ],
                'contactEmail' => [
                    'path' => 'email',
                    'label' => Yii::t('app', "CONTACT_EMAIL"),
                    'description' => Yii::t('app', "CONTACT_EMAIL DESCRIPTION"),
                    'value' => "info@company.org",
                    'rules' => [
                        ['required'],
                        ['email']
                    ],
                ],
                'contactWhatsapp' => [
                    'path' => 'whatsapp',
                    'label' => Yii::t('app', "CONTACT_WHATSAPP"),
                    'description' => Yii::t('app', "CONTACT_WHATSAPP DESCRIPTION"),
                    'value' => "https://wa.me/79200000000",
                    'rules' => [
                        ['url'],
                    ],
                ],
                'contactTelegram' => [
                    'path' => 'telegram',
                    'label' => Yii::t('app', "CONTACT_TELEGRAM"),
                    'description' => Yii::t('app', "CONTACT_TELEGRAM DESCRIPTION"),
                    'value' => "https://t.me/79200000000",
                    'rules' => [
                        ['url'],
                    ],
                ],
                'contactVk' => [
                    'path' => 'vk',
                    'label' => Yii::t('app', "CONTACT_VK"),
                    'description' => Yii::t('app', "CONTACT_VK DESCRIPTION"),
                    'value' => "https://vk.com/altezza_mebel",
                    'rules' => [
                        ['url'],
                    ],
                ],
                'contactAddress' => [
                    'path' => 'address',
                    'label' => Yii::t('app', "CONTACT_ADDRESS"),
                    'description' => Yii::t('app', "CONTACT_ADDRESS DESCRIPTION"),
                    'value' => "357433, Ставропольский край, г.Железноводск, пос. Иноземцево, ул.Промышленная, 11",
                    'rules' => [
                    ],
                    'inputOptions' => [
                        'type' => 'textarea',
                    ],
                ],
                'contactWorktime' => [
                    'path' => 'worktime',
                    'label' => Yii::t('app', "CONTACT_WORKTIME"),
                    'description' => Yii::t('app', "CONTACT_WORKTIME DESCRIPTION"),
                    'value' => "Пн-Пт: с 9:00 до 18:00",
                    'rules' => [
                    ],
                    'inputOptions' => [
                        'type' => 'textarea',
                    ],
                ],
                'seoDefaultKeywords' => [
                    'path' => 'seo_keywords',
                    'label' => Yii::t('app', "SEO_KEYWORDS"),
                    'description' => Yii::t('app', "SEO_KEYWORDS KEYWORDS"),
                    'value' => "Altezza",
                    'rules' => [
                    ],
                ],
                'seoDefaultDescription' => [
                    'path' => 'seo_description',
                    'label' => Yii::t('app', "SEO_DESCRIPTION"),
                    'description' => Yii::t('app', "SEO_DESCRIPTION DESCRIPTION"),
                    'value' => "Altezza",
                    'rules' => [
                    ],
                    'inputOptions' => [
                        'type' => 'textarea',
                    ],
                ],
                'isWebSiteOffline' => [
                    'path' => 'is_website_offline',
                    'label' => Yii::t('app', "IS_WEBSITE_OFFLINE"),
                    'description' => Yii::t('app', "IS_WEBSITE_OFFLINE DESCRIPTION"),
                    'value' => false,
                    'rules' => [
                    ],
                    'inputOptions' => [
                        'type' => 'checkbox',
                    ],
                ],
                'reportTelegramChatID' => [
                    'path' => 'report_telegram_chat_id',
                    'label' => Yii::t('app', "REPORT_TELEGRAM_CHAT_ID"),
                    'description' => Yii::t('app', "REPORT_TELEGRAM_CHAT_ID DESCRIPTION"),
                    'value' => "-894300596",
                    'rules' => [
                    ],
                ],
                'reportEmail' => [
                    'path' => 'report_email',
                    'label' => Yii::t('app', "REPORT_Email"),
                    'description' => Yii::t('app', "REPORT_Email DESCRIPTION"),
                    'value' => "info@ya.ru",
                    'rules' => [
                    ],
                ],

            ],
        ],

        'cache' => [
            'class' => \yii\caching\FileCache::class,
            'keyPrefix' => 'common_cache',
            'defaultDuration' => 3600,
        ],        
        // 'dummyCache' => [
        //     'class' => 'yii\caching\DummyCache',
        // ],
    ],
];
