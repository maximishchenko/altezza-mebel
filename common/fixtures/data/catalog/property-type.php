<?php

use backend\modules\catalog\models\PropertyType;
use common\models\Status;

$property = [];
$property['kitchen'] = [
    'id' => 1,
    'property_type' => PropertyType::TYPE,
    'name' => 'Кухня',
    'slug' => 'kitchen',
    'comment' => null,
    'sort' => 1,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => time(),
    'updated_at' => time(),
];

return $property;