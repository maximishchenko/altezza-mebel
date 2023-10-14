<?php

namespace backend\modules\catalog\models\query;

use yii\db\ActiveQuery;

class ProductQuery extends ActiveQuery
{
    public function all($db = null)
    {
        return parent::all($db);
    }

    public function one($db = null)
    {
        return parent::one($db);
    }
}
