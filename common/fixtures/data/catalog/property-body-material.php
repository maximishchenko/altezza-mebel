<?php

use backend\modules\catalog\models\PropertyBodyMaterial;
use common\models\Status;

$property = [];
$property['ldsp'] = [
    'id' => 26,
    'property_type' => PropertyBodyMaterial::TYPE,
    'name' => 'ЛДСП',
    'slug' => 'ldsp',
    'comment' => null,
    'sort' => 1,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => time(),
    'updated_at' => time(),
];

return $property;