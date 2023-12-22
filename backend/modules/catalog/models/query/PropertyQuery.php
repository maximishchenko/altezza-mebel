<?php

declare(strict_types=1);

namespace backend\modules\catalog\models\query;

use backend\models\BaseActiveQuery;
use yii\db\ActiveQuery;
use yii\db\Query;

class PropertyQuery extends BaseActiveQuery
{
    /**
     * @var ?string
     */
    public ?string $property_type = null;

    /**
     * @param $builder
     * @return ActiveQuery|Query
     */
    public function prepare($builder): ActiveQuery | Query
    {
        if ($this->property_type !== null) {
            $this->andWhere(['property_type' => $this->property_type]);
        }
        return parent::prepare($builder);
    }
}
