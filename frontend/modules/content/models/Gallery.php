<?php

declare(strict_types=1);

namespace frontend\modules\content\models;

use backend\modules\content\models\Gallery as backendGallery;
use frontend\interfaces\ImageInterface;
use frontend\modules\content\models\query\GalleryQuery;
use frontend\traits\cacheParamsTrait;

class Gallery extends backendGallery implements ImageInterface
{
    use cacheParamsTrait;

    public static function find(): GalleryQuery
    {
        return new GalleryQuery(get_called_class());
    }

    public function getThumb(): ?string
    {
        return ($this->image) ? '/' . self::UPLOAD_PATH . $this->image : null;
    }
}