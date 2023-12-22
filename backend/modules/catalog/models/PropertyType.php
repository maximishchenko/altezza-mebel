<?php

declare(strict_types=1);

namespace backend\modules\catalog\models;

use backend\modules\catalog\models\query\PropertyQuery;
use yii\helpers\ArrayHelper;

class PropertyType extends Property
{
    
    const TYPE = 'type';

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

    public static function getList(): array
    {
        return ArrayHelper::map(self::find()->all(),'id','name');
    }
}