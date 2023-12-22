<?php

namespace backend\modules\catalog\models;

use backend\modules\catalog\models\query\PropertyQuery;

class PropertyFasadMaterial extends Property
{
    
    const TYPE = 'fasad_material';

    public function init(): void
    {
        $this->property_type = self::TYPE;
        parent::init();
    }

    public static function find(): PropertyQuery
    {
        return new PropertyQuery(get_called_class(), ['property_type' => self::TYPE]);
    }

    public function beforeSave($insert): bool
    {
        $this->property_type = self::TYPE;
        return parent::beforeSave($insert);
    }
}