<?php

namespace frontend\modules\content\models;

use backend\modules\content\models\Advantage as backendAdvantage;
use frontend\interfaces\CacheInterface;
use frontend\interfaces\ImageInterface;
use frontend\modules\content\models\query\QuestionQuery;
use Yii;

class Advantage extends backendAdvantage implements ImageInterface, CacheInterface
{
    
    public static function find()
    {
        return new QuestionQuery(get_called_class());
    }

    public function getThumb(): ?string
    {
        return ($this->image) ? '/' . self::UPLOAD_PATH . $this->image : null;
    }

    public static function getCacheDependency(): \yii\caching\Dependency
    {
        return new \yii\caching\DbDependency([
            'sql' => "SELECT MAX(updated_at) FROM {{%advantage}}"
        ]);
    }

    public static function getCacheDuration(): int
    {
        return Yii::$app->cache->defaultDuration;
    }
}