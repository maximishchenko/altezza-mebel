<?php

namespace frontend\modules\catalog\models;

use backend\modules\catalog\models\Property as backendProperty;
use frontend\interfaces\CacheInterface;
use Yii;

class Property extends backendProperty implements CacheInterface
{
    public static function getCacheDependency(): \yii\caching\Dependency
    {
        return new \yii\caching\DbDependency([
            'sql' => "SELECT MAX(updated_at) FROM {{%property}}"
        ]);
    }

    public static function getCacheDuration(): int
    {
        return Yii::$app->cache->defaultDuration;
    }
}