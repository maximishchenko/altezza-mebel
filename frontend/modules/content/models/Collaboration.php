<?php

declare(strict_types=1);

namespace frontend\modules\content\models;

use backend\modules\content\models\Collaboration as backendCollaboration;
use frontend\interfaces\ImageInterface;
use frontend\modules\content\models\query\AboutQuery;
use frontend\modules\content\models\query\CollaborationQuery;
use frontend\traits\cacheParamsTrait;

class Collaboration extends backendCollaboration implements ImageInterface
{
    use cacheParamsTrait;

    public static function find(): CollaborationQuery
    {
        return new CollaborationQuery(get_called_class());
    }

    public function getThumb(): ?string
    {
        return '/' . self::UPLOAD_PATH . $this->image;
    }
}