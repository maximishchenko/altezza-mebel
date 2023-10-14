<?php

namespace backend\modules\catalog\models;

use backend\modules\catalog\models\Property;
use backend\modules\catalog\models\query\PropertyQuery;

class PropertyFasadCoating extends Property
{
    
    const TYPE = 'fasad_coating';

    public function init()
    {
        $this->property_type = self::TYPE;
        parent::init();
    }

    public static function find()
    {
        return new PropertyQuery(get_called_class(), ['property_type' => self::TYPE]);
    }

    public function beforeSave($insert)
    {
        $this->property_type = self::TYPE;
        return parent::beforeSave($insert);
    }
}