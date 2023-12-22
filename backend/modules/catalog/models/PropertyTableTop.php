<?php

namespace backend\modules\catalog\models;

use backend\modules\catalog\models\Property;
use backend\modules\catalog\models\query\PropertyQuery;

class PropertyTableTop extends Property
{
    
    const TYPE = 'table_top';

    /**
     * @return void
     */
    public function init(): void
    {
        $this->property_type = self::TYPE;
        parent::init();
    }

    /**
     * @return PropertyQuery
     */
    public static function find(): PropertyQuery
    {
        return new PropertyQuery(get_called_class(), ['property_type' => self::TYPE]);
    }

    /**
     * @param $insert
     * @return bool
     */
    public function beforeSave($insert): bool
    {
        $this->property_type = self::TYPE;
        return parent::beforeSave($insert);
    }
}