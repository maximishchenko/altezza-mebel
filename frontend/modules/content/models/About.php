<?php

declare(strict_types=1);

namespace frontend\modules\content\models;

use backend\modules\content\models\About as backendAbout;
use frontend\interfaces\ImageInterface;
use frontend\modules\content\models\query\AboutQuery;
use frontend\traits\cacheParamsTrait;

class About extends backendAbout implements ImageInterface
{
    use cacheParamsTrait;

    public static function find(): AboutQuery
    {
        return new AboutQuery(get_called_class());
    }

    public function getThumb(): ?string
    {
        return '/' . self::UPLOAD_PATH . $this->image;
    }
}