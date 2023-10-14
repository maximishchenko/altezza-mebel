<?php

namespace frontend\modules\content\models;

use backend\modules\content\models\Advantage as backendAdvantage;
use frontend\modules\content\models\query\QuestionQuery;

class Advantage extends backendAdvantage
{
    
    public static function find()
    {
        return new QuestionQuery(get_called_class());
    }

    public function getThumb()
    {
        return ($this->image) ? '/' . self::UPLOAD_PATH . $this->image : null;
    }
}