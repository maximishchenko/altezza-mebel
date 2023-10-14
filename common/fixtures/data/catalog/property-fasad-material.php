<?php

use backend\modules\catalog\models\PropertyFasadMaterial;
use common\models\Status;

$property = [];
$property['mdf'] = [
    'id' => 12,
    'property_type' => PropertyFasadMaterial::TYPE,
    'name' => 'МДФ',
    'slug' => 'mdf',
    'comment' => null,
    'sort' => 1,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => time(),
    'updated_at' => time(),
];
$property['ldsp'] = [
    'id' => 13,
    'property_type' => PropertyFasadMaterial::TYPE,
    'name' => 'ЛДСП',
    'slug' => 'ldsp',
    'comment' => null,
    'sort' => 2,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => time(),
    'updated_at' => time(),
];
$property['plastic'] = [
    'id' => 14,
    'property_type' => PropertyFasadMaterial::TYPE,
    'name' => 'Пластик',
    'slug' => 'plastic',
    'comment' => null,
    'sort' => 3,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => time(),
    'updated_at' => time(),
];
$property['glass'] = [
    'id' => 15,
    'property_type' => PropertyFasadMaterial::TYPE,
    'name' => 'Стекло',
    'slug' => 'glass',
    'comment' => null,
    'sort' => 4,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => time(),
    'updated_at' => time(),
];

return $property;