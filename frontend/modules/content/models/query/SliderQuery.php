<?php

namespace frontend\modules\content\models\query;

use common\models\Sort;
use common\models\Status;
use backend\modules\content\models\query\SliderQuery as backendSliderQuery;

class SliderQuery extends backendSliderQuery
{
    public function active()
    {
        return $this->andWhere(['status' => Status::STATUS_ACTIVE]);
    }

    public function ordered()
    {
        return $this->orderBy(['sort' => Sort::DEFAULT_SORT_VALUE]);
    }
}
