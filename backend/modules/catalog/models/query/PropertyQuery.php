<?php

namespace backend\modules\catalog\models\query;

use backend\modules\catalog\models\Property;
use common\models\Status;

class PropertyQuery extends \yii\db\ActiveQuery
{
    public $property_type;

    public function prepare($builder)
    {
        if ($this->property_type !== null) {
            $this->andWhere(['property_type' => $this->property_type]);
        }
        return parent::prepare($builder);
    }

    public function active()
    {
        return $this->andWhere([Property::tableName() . '.status' => Status::STATUS_ACTIVE]);
    }
}
