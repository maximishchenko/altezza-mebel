<?php

namespace frontend\modules\content\models;

use backend\modules\content\models\About as backendAbout;
use frontend\modules\content\models\query\AboutQuery;

class About extends backendAbout
{

    public static function find()
    {
        return new AboutQuery(get_called_class());
    }

    public function getThumb()
    {
        return '/' . self::UPLOAD_PATH . $this->image;
    }
}