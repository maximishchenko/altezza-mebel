<?php

use backend\modules\catalog\models\PropertyDecorativeElement;
use common\models\Status;

$property = [];
$property['cornice'] = [
    'id' => 21,
    'property_type' => PropertyDecorativeElement::TYPE,
    'name' => 'Карниз',
    'slug' => 'cornice',
    'comment' => null,
    'sort' => 1,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => time(),
    'updated_at' => time(),
];
$property['pillaster'] = [
    'id' => 22,
    'property_type' => PropertyDecorativeElement::TYPE,
    'name' => 'Пилястра',
    'slug' => 'pillaster',
    'comment' => null,
    'sort' => 2,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => time(),
    'updated_at' => time(),
];
$property['jib'] = [
    'id' => 23,
    'property_type' => PropertyDecorativeElement::TYPE,
    'name' => 'Гусек',
    'slug' => 'jib',
    'comment' => null,
    'sort' => 3,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => time(),
    'updated_at' => time(),
];
$property['lightbar'] = [
    'id' => 24,
    'property_type' => PropertyDecorativeElement::TYPE,
    'name' => 'Световая планка',
    'slug' => 'lightbar',
    'comment' => null,
    'sort' => 4,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => time(),
    'updated_at' => time(),
];
$property['balustrade'] = [
    'id' => 25,
    'property_type' => PropertyDecorativeElement::TYPE,
    'name' => 'Балюстрада',
    'slug' => 'balustrade',
    'comment' => null,
    'sort' => 5,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => time(),
    'updated_at' => time(),
];

return $property;