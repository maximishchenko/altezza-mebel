<?php

namespace backend\modules\management\models;

use Yii;

/**
 * This is the model class for table "{{%setting}}".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $key
 * @property string|null $value
 * @property string|null $field_type
 * @property string|null $tab
 */
class Setting extends \yii\base\Model
{

    const TAB_CONTACT = 'contact';
    const TAB_SEO = 'seo';
    const TAB_GLOBAL = 'global';

    public static function getTabsArray(): array
    {
        return [
            self::TAB_CONTACT => Yii::t('app', 'SETTING_CONTACT_TAB'),
            self::TAB_SEO => Yii::t('app', 'SETTING_SEO_TAB'),
            self::TAB_GLOBAL => Yii::t('app', 'SETTING_TAB_GLOBAL'),
        ];
    }

    public static function getTabsItems(): array
    {
        return [
            self::TAB_CONTACT => [
                'phone', 'email', 'whatsapp', 'telegram', 'address', 'worktime'
            ],
            self::TAB_SEO => [
                'seo_keywords', 'seo_description', 'seo_index_now_key',
            ],
            self::TAB_GLOBAL => [
                'is_website_offline', 'report_telegram_chat_id', 'report_email',
            ],
        ];
    }
}
