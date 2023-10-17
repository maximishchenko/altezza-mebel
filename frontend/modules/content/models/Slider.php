<?php

namespace frontend\modules\content\models;

use backend\modules\content\models\Slider as backendSlider;
use frontend\interfaces\ImageInterface;
use frontend\modules\content\models\query\SliderQuery;
use frontend\traits\cacheParamsTrait;

class Slider extends backendSlider implements ImageInterface
{
    use cacheParamsTrait;

    public static function find()
    {
        return new SliderQuery(get_called_class());
    }

    public function getThumb(): ?string
    {
        return ($this->image) ? '/' . self::UPLOAD_PATH . $this->image : null;
    }
}