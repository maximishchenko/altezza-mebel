<?php

namespace backend\modules\catalog\models\query;

use backend\modules\catalog\models\PropertyFasadCoating;

class ProductPropertyQuery extends \yii\db\ActiveQuery
{

    public function onlyFasadCoating()
    {
        return $this->andWhere(['property_type' => PropertyFasadCoating::TYPE]);
    }

    public function all($db = null)
    {
        return parent::all($db);
    }

    public function one($db = null)
    {
        return parent::one($db);
    }
}
