<?php

namespace frontend\modules\catalog\models\query;

use common\models\Status;
use frontend\modules\catalog\models\Product;
use backend\modules\catalog\models\query\ProductQuery as backendProductQuery;
use yii\db\Query;

class ProductQuery extends backendProductQuery
{
    public function active(): Query
    {
        return $this->andWhere([Product::tableName() . '.status' => Status::STATUS_ACTIVE]);
    }

    public function onlyNew(): Query
    {
        return $this->andWhere([Product::tableName() . '.is_new' => 1]);
    }

    public function orderPopular(): Query
    {
        return $this->orderBy([Product::tableName() . '.view_count' => SORT_DESC]);
    }
}
