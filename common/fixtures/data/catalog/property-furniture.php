<?php

use backend\modules\catalog\models\PropertyFurniture;
use common\models\Status;

$property = [];
$property['makmart'] = [
    'id' => 27,
    'property_type' => PropertyFurniture::TYPE,
    'name' => 'Makmart',
    'slug' => 'makmart',
    'comment' => null,
    'sort' => 1,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => time(),
    'updated_at' => time(),
];
$property['blum'] = [
    'id' => 28,
    'property_type' => PropertyFurniture::TYPE,
    'name' => 'Blum',
    'slug' => 'blum',
    'comment' => null,
    'sort' => 2,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => time(),
    'updated_at' => time(),
];
$property['unihopper'] = [
    'id' => 29,
    'property_type' => PropertyFurniture::TYPE,
    'name' => 'Unihopper',
    'slug' => 'unihopper',
    'comment' => null,
    'sort' => 3,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => time(),
    'updated_at' => time(),
];
$property['firmax'] = [
    'id' => 30,
    'property_type' => PropertyFurniture::TYPE,
    'name' => 'Firmax',
    'slug' => 'firmax',
    'comment' => null,
    'sort' => 4,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => time(),
    'updated_at' => time(),
];

return $property;