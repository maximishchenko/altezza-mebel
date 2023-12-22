<?php

declare(strict_types=1);

namespace frontend\modules\content\models\query;

use common\models\Status;
use backend\modules\content\models\query\AdvantageQuery as backendAdvantageQuery;
use yii\db\Query;

class AdvantageQuery extends backendAdvantageQuery
{
    public function active(): Query
    {
        return $this->andWhere(['status' => Status::STATUS_ACTIVE]);
    }

    public function ordered(): Query
    {
        return $this->orderBy(['sort' => SORT_DESC]);
    }
}
