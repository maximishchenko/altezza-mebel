<?php

namespace frontend\modules\content\models\query;

use common\models\Status;
use backend\modules\content\models\query\AboutQuery as backendAboutQuery;

class AboutQuery extends backendAboutQuery
{
    public function active()
    {
        return $this->andWhere(['status' => Status::STATUS_ACTIVE]);
    }

    public function ordered()
    {
        return $this->orderBy(['sort' => SORT_ASC]);
    }
}
