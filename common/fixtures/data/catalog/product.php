<?php

use common\models\Status;

$time = time();

$product = [];
$product['1'] = [
    'id' => 1,
    'type_id' => 1, //1
    'form_id' => 2, // 2 - 5
    'style_id' => 7, // 6 - 11
    'appliance_id' => 36, // 36 - 37
    'name' => 'Алана',
    'slug' => 'alana',
    'image' => null,
    'description' => null,
    'comment' => null,
    'sort' => 1,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => $time,
    'updated_at' => $time,
    'created_by' => null,
    'updated_by' => null,
];
$product['2'] = [
    'id' => 2,
    'type_id' => 1, //1
    'form_id' => 4, // 2 - 5
    'style_id' => 8, // 6 - 11
    'appliance_id' => 36, // 36 - 37
    'name' => 'Снежана',
    'slug' => 'snezhana',
    'image' => null,
    'description' => null,
    'comment' => null,
    'sort' => 2,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => $time,
    'updated_at' => $time,
    'created_by' => null,
    'updated_by' => null,
];
$product['3'] = [
    'id' => 3,
    'type_id' => 1, //1
    'form_id' => 3, // 2 - 5
    'style_id' => 7, // 6 - 11
    'appliance_id' => 37, // 36 - 37
    'name' => 'Бештау',
    'slug' => 'beshtau',
    'image' => null,
    'description' => null,
    'comment' => null,
    'sort' => 3,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => $time,
    'updated_at' => $time,
    'created_by' => null,
    'updated_by' => null,
];
$product['4'] = [
    'id' => 4,
    'type_id' => 1, //1
    'form_id' => 5, // 2 - 5
    'style_id' => 6, // 6 - 11
    'appliance_id' => 37, // 36 - 37
    'name' => 'Болонь №1',
    'slug' => 'bolon-1',
    'image' => null,
    'description' => null,
    'comment' => null,
    'sort' => 4,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => $time,
    'updated_at' => $time,
    'created_by' => null,
    'updated_by' => null,
];
$product['5'] = [
    'id' => 5,
    'type_id' => 1, //1
    'form_id' => 4, // 2 - 5
    'style_id' => 9, // 6 - 11
    'appliance_id' => 36, // 36 - 37
    'name' => 'Болонь №2',
    'slug' => 'bolon-2',
    'image' => null,
    'description' => null,
    'comment' => null,
    'sort' => 5,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => $time,
    'updated_at' => $time,
    'created_by' => null,
    'updated_by' => null,
];
$product['6'] = [
    'id' => 6,
    'type_id' => 1, //1
    'form_id' => 4, // 2 - 5
    'style_id' => 10, // 6 - 11
    'appliance_id' => 36, // 36 - 37
    'name' => 'Ока №1',
    'slug' => 'oka-1',
    'image' => null,
    'description' => null,
    'comment' => null,
    'sort' => 6,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => $time,
    'updated_at' => $time,
    'created_by' => null,
    'updated_by' => null,
];
$product['7'] = [
    'id' => 7,
    'type_id' => 1, //1
    'form_id' => 3, // 2 - 5
    'style_id' => 9, // 6 - 11
    'appliance_id' => 36, // 36 - 37
    'name' => 'Ока №2',
    'slug' => 'oka-2',
    'image' => null,
    'description' => null,
    'comment' => null,
    'sort' => 7,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => $time,
    'updated_at' => $time,
    'created_by' => null,
    'updated_by' => null,
];
$product['8'] = [
    'id' => 8,
    'type_id' => 1, //1
    'form_id' => 4, // 2 - 5
    'style_id' => 7, // 6 - 11
    'appliance_id' => 37, // 36 - 37
    'name' => 'Гокли',
    'slug' => 'gokli',
    'image' => null,
    'description' => null,
    'comment' => null,
    'sort' => 8,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => $time,
    'updated_at' => $time,
    'created_by' => null,
    'updated_by' => null,
];
$product['9'] = [
    'id' => 9,
    'type_id' => 1, //1
    'form_id' => 3, // 2 - 5
    'style_id' => 8, // 6 - 11
    'appliance_id' => 37, // 36 - 37
    'name' => 'Эльтон',
    'slug' => 'elton',
    'image' => null,
    'description' => null,
    'comment' => null,
    'sort' => 9,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => $time,
    'updated_at' => $time,
    'created_by' => null,
    'updated_by' => null,
];
$product['10'] = [
    'id' => 10,
    'type_id' => 1, //1
    'form_id' => 4, // 2 - 5
    'style_id' => 11, // 6 - 11
    'appliance_id' => 36, // 36 - 37
    'name' => 'Эворон',
    'slug' => 'evoron',
    'image' => null,
    'description' => null,
    'comment' => null,
    'sort' => 10,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => $time,
    'updated_at' => $time,
    'created_by' => null,
    'updated_by' => null,
];
$product['11'] = [
    'id' => 11,
    'type_id' => 1, //1
    'form_id' => 3, // 2 - 5
    'style_id' => 8, // 6 - 11
    'appliance_id' => 37, // 36 - 37
    'name' => 'Уилпата',
    'slug' => 'uilpata',
    'image' => null,
    'description' => null,
    'comment' => null,
    'sort' => 11,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => $time,
    'updated_at' => $time,
    'created_by' => null,
    'updated_by' => null,
];
$product['12'] = [
    'id' => 12,
    'type_id' => 1, //1
    'form_id' => 4, // 2 - 5
    'style_id' => 9, // 6 - 11
    'appliance_id' => 37, // 36 - 37
    'name' => 'Суган №1',
    'slug' => 'sugan-1',
    'image' => null,
    'description' => null,
    'comment' => null,
    'sort' => 12,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => $time,
    'updated_at' => $time,
    'created_by' => null,
    'updated_by' => null,
];
$product['13'] = [
    'id' => 13,
    'type_id' => 1, //1
    'form_id' => 2, // 2 - 5
    'style_id' => 8, // 6 - 11
    'appliance_id' => 36, // 36 - 37
    'name' => 'Суган №2',
    'slug' => 'sugan-2',
    'image' => null,
    'description' => null,
    'comment' => null,
    'sort' => 13,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => $time,
    'updated_at' => $time,
    'created_by' => null,
    'updated_by' => null,
];
$product['14'] = [
    'id' => 14,
    'type_id' => 1, //1
    'form_id' => 2, // 2 - 5
    'style_id' => 8, // 6 - 11
    'appliance_id' => 36, // 36 - 37
    'name' => 'Сонгути №1',
    'slug' => 'songuti-1',
    'image' => null,
    'description' => null,
    'comment' => null,
    'sort' => 14,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => $time,
    'updated_at' => $time,
    'created_by' => null,
    'updated_by' => null,
];
$product['15'] = [
    'id' => 15,
    'type_id' => 1, //1
    'form_id' => 3, // 2 - 5
    'style_id' => 7, // 6 - 11
    'appliance_id' => 37, // 36 - 37
    'name' => 'Сонгути №2',
    'slug' => 'songuti-2',
    'image' => null,
    'description' => null,
    'comment' => null,
    'sort' => 15,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => $time,
    'updated_at' => $time,
    'created_by' => null,
    'updated_by' => null,
];
$product['16'] = [
    'id' => 16,
    'type_id' => 1, //1
    'form_id' => 4, // 2 - 5
    'style_id' => 8, // 6 - 11
    'appliance_id' => 37, // 36 - 37
    'name' => 'Селигер',
    'slug' => 'seliger',
    'image' => null,
    'description' => null,
    'comment' => null,
    'sort' => 16,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => $time,
    'updated_at' => $time,
    'created_by' => null,
    'updated_by' => null,
];
$product['17'] = [
    'id' => 17,
    'type_id' => 1, //1
    'form_id' => 3, // 2 - 5
    'style_id' => 9, // 6 - 11
    'appliance_id' => 36, // 36 - 37
    'name' => 'Сартлан',
    'slug' => 'sartlan',
    'image' => null,
    'description' => null,
    'comment' => null,
    'sort' => 17,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => $time,
    'updated_at' => $time,
    'created_by' => null,
    'updated_by' => null,
];
$product['18'] = [
    'id' => 18,
    'type_id' => 1, //1
    'form_id' => 4, // 2 - 5
    'style_id' => 7, // 6 - 11
    'appliance_id' => 36, // 36 - 37
    'name' => 'Орель',
    'slug' => 'orel',
    'image' => null,
    'description' => null,
    'comment' => null,
    'sort' => 18,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => $time,
    'updated_at' => $time,
    'created_by' => null,
    'updated_by' => null,
];
$product['19'] = [
    'id' => 19,
    'type_id' => 1, //1
    'form_id' => 4, // 2 - 5
    'style_id' => 7, // 6 - 11
    'appliance_id' => 36, // 36 - 37
    'name' => 'Комито №1',
    'slug' => 'komito-1',
    'image' => null,
    'description' => null,
    'comment' => null,
    'sort' => 19,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => $time,
    'updated_at' => $time,
    'created_by' => null,
    'updated_by' => null,
];
$product['20'] = [
    'id' => 20,
    'type_id' => 1, //1
    'form_id' => 5, // 2 - 5
    'style_id' => 10, // 6 - 11
    'appliance_id' => 37, // 36 - 37
    'name' => 'Комито №4',
    'slug' => 'komito-4',
    'image' => null,
    'description' => null,
    'comment' => null,
    'sort' => 20,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => $time,
    'updated_at' => $time,
    'created_by' => null,
    'updated_by' => null,
];
$product['21'] = [
    'id' => 21,
    'type_id' => 1, //1
    'form_id' => 3, // 2 - 5
    'style_id' => 9, // 6 - 11
    'appliance_id' => 37, // 36 - 37
    'name' => 'Комито №2',
    'slug' => 'komito-2',
    'image' => null,
    'description' => null,
    'comment' => null,
    'sort' => 21,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => $time,
    'updated_at' => $time,
    'created_by' => null,
    'updated_by' => null,
];
$product['22'] = [
    'id' => 22,
    'type_id' => 1, //1
    'form_id' => 4, // 2 - 5
    'style_id' => 8, // 6 - 11
    'appliance_id' => 36, // 36 - 37
    'name' => 'Комито №3',
    'slug' => 'komito-3',
    'image' => null,
    'description' => null,
    'comment' => null,
    'sort' => 22,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => $time,
    'updated_at' => $time,
    'created_by' => null,
    'updated_by' => null,
];
$product['23'] = [
    'id' => 23,
    'type_id' => 1, //1
    'form_id' => 3, // 2 - 5
    'style_id' => 7, // 6 - 11
    'appliance_id' => 36, // 36 - 37
    'name' => 'Кета №1',
    'slug' => 'keta-1',
    'image' => null,
    'description' => null,
    'comment' => null,
    'sort' => 23,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => $time,
    'updated_at' => $time,
    'created_by' => null,
    'updated_by' => null,
];
$product['24'] = [
    'id' => 24,
    'type_id' => 1, //1
    'form_id' => 4, // 2 - 5
    'style_id' => 10, // 6 - 11
    'appliance_id' => 36, // 36 - 37
    'name' => 'Кета №2',
    'slug' => 'keta-2',
    'image' => null,
    'description' => null,
    'comment' => null,
    'sort' => 24,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => $time,
    'updated_at' => $time,
    'created_by' => null,
    'updated_by' => null,
];
$product['25'] = [
    'id' => 25,
    'type_id' => 1, //1
    'form_id' => 3, // 2 - 5
    'style_id' => 9, // 6 - 11
    'appliance_id' => 37, // 36 - 37
    'name' => 'Кета №3',
    'slug' => 'keta-3',
    'image' => null,
    'description' => null,
    'comment' => null,
    'sort' => 25,
    'status' => Status::STATUS_BLOCKED,
    'created_at' => $time,
    'updated_at' => $time,
    'created_by' => null,
    'updated_by' => null,
];
$product['26'] = [
    'id' => 26,
    'type_id' => 1, //1
    'form_id' => 4, // 2 - 5
    'style_id' => 8, // 6 - 11
    'appliance_id' => 36, // 36 - 37
    'name' => 'Вологата',
    'slug' => 'vologata',
    'image' => null,
    'description' => null,
    'comment' => null,
    'sort' => 26,
    'status' => Status::STATUS_BLOCKED,
    'created_at' => $time,
    'updated_at' => $time,
    'created_by' => null,
    'updated_by' => null,
];

return $product;