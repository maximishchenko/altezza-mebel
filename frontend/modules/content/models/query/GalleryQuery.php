<?php

declare(strict_types=1);

namespace frontend\modules\content\models\query;

use common\models\Sort;
use common\models\Status;
use backend\modules\content\models\query\GalleryQuery as backendGalleryQuery;
use yii\db\Query;

class GalleryQuery extends backendGalleryQuery
{
    public function active(): Query
    {
        return $this->andWhere(['status' => Status::STATUS_ACTIVE]);
    }

    public function ordered(): Query
    {
        return $this->orderBy(['sort' => Sort::DEFAULT_SORT_VALUE]);
    }
}
