<?php

declare(strict_types=1);

namespace backend\modules\catalog\models\query;

use backend\models\BaseActiveQuery;
use backend\modules\catalog\models\PropertyFasadCoating;

class ProductPropertyQuery extends BaseActiveQuery
{
    /**
     * @return ProductPropertyQuery
     */
    public function onlyFasadCoating(): ProductPropertyQuery
    {
        return $this->andWhere(['property_type' => PropertyFasadCoating::TYPE]);
    }
}
