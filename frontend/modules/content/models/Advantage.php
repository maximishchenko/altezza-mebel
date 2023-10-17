<?php

namespace frontend\modules\content\models;

use backend\modules\content\models\Advantage as backendAdvantage;
use frontend\interfaces\ImageInterface;
use frontend\modules\content\models\query\QuestionQuery;
use frontend\traits\cacheParamsTrait;

class Advantage extends backendAdvantage implements ImageInterface
{
    use cacheParamsTrait;
    
    public static function find()
    {
        return new QuestionQuery(get_called_class());
    }

    public function getThumb(): ?string
    {
        return ($this->image) ? '/' . self::UPLOAD_PATH . $this->image : null;
    }
}