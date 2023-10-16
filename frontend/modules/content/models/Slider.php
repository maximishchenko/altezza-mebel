<?php

namespace frontend\modules\content\models;

use backend\modules\content\models\Slider as backendSlider;
use frontend\interfaces\CacheInterface;
use frontend\interfaces\ImageInterface;
use frontend\modules\content\models\query\SliderQuery;
use Yii;

class Slider extends backendSlider implements CacheInterface, ImageInterface
{
    
    public static function find()
    {
        return new SliderQuery(get_called_class());
    }

    public function getThumb(): ?string
    {
        return ($this->image) ? '/' . self::UPLOAD_PATH . $this->image : null;
    }

    public static function getCacheDependency(): \yii\caching\Dependency
    {
        return new \yii\caching\DbDependency([
            'sql' => "SELECT MAX(updated_at) FROM {{%slider}}"
        ]);
    }

    public static function getCacheDuration(): int
    {
        return Yii::$app->cache->defaultDuration;
    }
}