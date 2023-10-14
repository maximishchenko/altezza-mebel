<?php

use backend\modules\catalog\models\PropertyAppliance;
use common\models\Status;

$property = [];

$property['built-in'] = [
    'id' => 36,
    'property_type' => PropertyAppliance::TYPE,
    'name' => 'Встраиваемая',
    'slug' => 'built-in',
    'comment' => null,
    'sort' => 1,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => time(),
    'updated_at' => time(),
];
$property['separate'] = [
    'id' => 37,
    'property_type' => PropertyAppliance::TYPE,
    'name' => 'Отдельно-стоящая',
    'slug' => 'separate',
    'comment' => null,
    'sort' => 2,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => time(),
    'updated_at' => time(),
];

return $property;