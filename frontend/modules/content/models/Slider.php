<?php

namespace frontend\modules\content\models;

use backend\modules\content\models\Slider as backendSlider;
use frontend\modules\content\models\query\SliderQuery;

class Slider extends backendSlider
{
    
    public static function find()
    {
        return new SliderQuery(get_called_class());
    }

    public function getThumb()
    {
        return ($this->image) ? '/' . self::UPLOAD_PATH . $this->image : null;
    }
}