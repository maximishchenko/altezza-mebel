<?php

use backend\modules\catalog\models\PropertyFasadCoating;
use common\models\Status;

$property = [];
$property['mate'] = [
    'id' => 16,
    'property_type' => PropertyFasadCoating::TYPE,
    'name' => 'Матовое',
    'slug' => 'mate',
    'comment' => null,
    'sort' => 1,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => time(),
    'updated_at' => time(),
];
$property['supermate'] = [
    'id' => 17,
    'property_type' => PropertyFasadCoating::TYPE,
    'name' => 'Суперматовое',
    'slug' => 'supermate',
    'comment' => null,
    'sort' => 2,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => time(),
    'updated_at' => time(),
];
$property['glossy'] = [
    'id' => 18,
    'property_type' => PropertyFasadCoating::TYPE,
    'name' => 'Глянцевое',
    'slug' => 'glossy',
    'comment' => null,
    'sort' => 3,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => time(),
    'updated_at' => time(),
];
$property['woody'] = [
    'id' => 19,
    'property_type' => PropertyFasadCoating::TYPE,
    'name' => 'Древесное',
    'slug' => 'woody',
    'comment' => null,
    'sort' => 4,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => time(),
    'updated_at' => time(),
];
$property['enamel'] = [
    'id' => 20,
    'property_type' => PropertyFasadCoating::TYPE,
    'name' => 'Эмаль',
    'slug' => 'enamel',
    'comment' => null,
    'sort' => 5,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => time(),
    'updated_at' => time(),
];

return $property;