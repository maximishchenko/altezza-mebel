<?php

declare(strict_types=1);

namespace backend\models;

use backend\modules\catalog\models\Property;
use common\models\Status;
use yii\db\ActiveRecord;
use yii\db\ActiveQuery;
use yii\db\Query;

class BaseActiveQuery extends ActiveQuery
{

    /**
     * @param $db
     * @return array|ActiveRecord|ActiveRecord[]
     */
    public function all($db = null): array | ActiveRecord
    {
        return parent::all($db);
    }

    /**
     * @param $db
     * @return array|ActiveRecord|null
     */
    public function one($db = null): array | null | ActiveRecord
    {
        return parent::one($db);
    }

    /**
     * @return Query
     */
    public function active(): Query
    {
        return $this->andWhere([Property::tableName() . '.status' => Status::STATUS_ACTIVE]);
    }
}