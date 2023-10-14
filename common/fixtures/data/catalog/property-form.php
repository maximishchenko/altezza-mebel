<?php

use backend\modules\catalog\models\PropertyForm;
use common\models\Status;

$property = [];
$property['direct'] = [
    'id' => 2,
    'property_type' => PropertyForm::TYPE,
    'name' => 'Прямая',
    'slug' => 'direct',
    'comment' => null,
    'sort' => 1,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => time(),
    'updated_at' => time(),
];
$property['corner'] = [
    'id' => 3,
    'property_type' => PropertyForm::TYPE,
    'name' => 'Угловая',
    'slug' => 'corner',
    'comment' => null,
    'sort' => 2,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => time(),
    'updated_at' => time(),
];
$property['u-shaped'] = [
    'id' => 4,
    'property_type' => PropertyForm::TYPE,
    'name' => 'П-образная',
    'slug' => 'u-shaped',
    'comment' => null,
    'sort' => 3,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => time(),
    'updated_at' => time(),
];
$property['island'] = [
    'id' => 5,
    'property_type' => PropertyForm::TYPE,
    'name' => 'С островком',
    'slug' => 'island',
    'comment' => null,
    'sort' => 4,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => time(),
    'updated_at' => time(),
];

return $property;