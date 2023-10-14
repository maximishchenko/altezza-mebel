<?php

namespace backend\modules\catalog\models;

use backend\modules\catalog\models\Property;
use backend\modules\catalog\models\query\PropertyQuery;
use yii\helpers\ArrayHelper;

class PropertyAppliance extends Property
{
    
    const TYPE = 'appliance';

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

    public static function getList()
    {
        return ArrayHelper::map(self::find()->all(),'id','name');
    }
}