<?php

use backend\modules\catalog\models\PropertyBacklight;
use common\models\Status;

$property = [];

$property['invoice'] = [
    'id' => 31,
    'property_type' => PropertyBacklight::TYPE,
    'name' => 'Накладная',
    'slug' => 'invoice',
    'comment' => null,
    'sort' => 1,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => time(),
    'updated_at' => time(),
];
$property['mortise'] = [
    'id' => 32,
    'property_type' => PropertyBacklight::TYPE,
    'name' => 'Врезная',
    'slug' => 'mortise',
    'comment' => null,
    'sort' => 2,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => time(),
    'updated_at' => time(),
];

return $property;