<?php

use backend\modules\catalog\models\PropertyStyle;
use common\models\Status;

$property = [];
$property['minimalism'] = [
    'id' => 6,
    'property_type' => PropertyStyle::TYPE,
    'name' => 'Минимализм',
    'slug' => 'minimalism',
    'comment' => null,
    'sort' => 1,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => time(),
    'updated_at' => time(),
];
$property['neoclassic'] = [
    'id' => 7,
    'property_type' => PropertyStyle::TYPE,
    'name' => 'Неоклассика',
    'slug' => 'neoclassic',
    'comment' => null,
    'sort' => 2,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => time(),
    'updated_at' => time(),
];
$property['modernic'] = [
    'id' => 8,
    'property_type' => PropertyStyle::TYPE,
    'name' => 'Современный',
    'slug' => 'modernic',
    'comment' => null,
    'sort' => 3,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => time(),
    'updated_at' => time(),
];
$property['modern'] = [
    'id' => 9,
    'property_type' => PropertyStyle::TYPE,
    'name' => 'Модерн',
    'slug' => 'modern',
    'comment' => null,
    'sort' => 4,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => time(),
    'updated_at' => time(),
];
$property['classic'] = [
    'id' => 10,
    'property_type' => PropertyStyle::TYPE,
    'name' => 'Классический',
    'slug' => 'classic',
    'comment' => null,
    'sort' => 5,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => time(),
    'updated_at' => time(),
];
$property['scandinavian'] = [
    'id' => 11,
    'property_type' => PropertyStyle::TYPE,
    'name' => 'Скандинавский',
    'slug' => 'scandinavian',
    'comment' => null,
    'sort' => 6,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => time(),
    'updated_at' => time(),
];

return $property;