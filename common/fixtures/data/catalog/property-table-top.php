<?php

use backend\modules\catalog\models\PropertyTableTop;
use common\models\Status;

$property = [];
$property['stone'] = [
    'id' => 33,
    'property_type' => PropertyTableTop::TYPE,
    'name' => 'Камень',
    'slug' => 'stone',
    'comment' => null,
    'sort' => 1,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => time(),
    'updated_at' => time(),
];
$property['mdf'] = [
    'id' => 34,
    'property_type' => PropertyTableTop::TYPE,
    'name' => 'МДФ',
    'slug' => 'mdf',
    'comment' => null,
    'sort' => 2,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => time(),
    'updated_at' => time(),
];
$property['ldsp'] = [
    'id' => 35,
    'property_type' => PropertyTableTop::TYPE,
    'name' => 'ЛДСП',
    'slug' => 'ldsp',
    'comment' => null,
    'sort' => 3,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => time(),
    'updated_at' => time(),
];

return $property;