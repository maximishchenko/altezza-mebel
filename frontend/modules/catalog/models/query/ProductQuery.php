<?php

namespace frontend\modules\catalog\models\query;

use common\models\Status;
use frontend\modules\catalog\models\Product;
use backend\modules\catalog\models\query\ProductQuery as backendProductQuery;

class ProductQuery extends backendProductQuery
{
    public function active()
    {
        return $this->andWhere([Product::tableName() . '.status' => Status::STATUS_ACTIVE]);
    }

    public function onlyNew()
    {
        return $this->andWhere([Product::tableName() . '.is_new' => 1]);
    }

    public function orderPopular()
    {
        return $this->orderBy([Product::tableName() . '.view_count' => SORT_DESC]);
    }
}
