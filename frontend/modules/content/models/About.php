<?php

namespace frontend\modules\content\models;

use backend\modules\content\models\About as backendAbout;
use frontend\interfaces\CacheInterface;
use frontend\interfaces\ImageInterface;
use frontend\modules\content\models\query\AboutQuery;
use Yii;

class About extends backendAbout implements ImageInterface, CacheInterface
{

    public static function find()
    {
        return new AboutQuery(get_called_class());
    }

    public function getThumb(): ?string
    {
        return '/' . self::UPLOAD_PATH . $this->image;
    }

    public static function getCacheDependency(): \yii\caching\Dependency
    {
        return new \yii\caching\DbDependency([
            'sql' => "SELECT MAX(updated_at) FROM {{%about}}"
        ]);
    }

    public static function getCacheDuration(): int
    {
        return Yii::$app->cache->defaultDuration;
    }
}