<?php

use common\models\Status;

$collaborations = [];
$collaborations[1] = [
    'id' => 1,
    'title' => 'Дизайн-студии',
    'description' => 'Мебельная фабрика «Altezza»  приглашает к сотрудничеству дизайн-студии и частных дизайнеров,  имеющих опыт работы, как с кухонными помещениями, так и с оформлением интерьера домов в целом.',
    'image' => null,
    'link' => null,
    'comment' => null,
    'sort' => 1,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => time(),
    'updated_at' => time(),
    'created_by' => null,
    'updated_by' => null,
];
$collaborations[2] = [
    'id' => 2,
    'title' => 'Компании-застройщики',
    'description' => 'Фабрика всегда готова к сотрудничеству с компаниями-застройщиками по меблировке жилищных комплексов.',
    'image' => null,
    'link' => null,
    'comment' => null,
    'sort' => 2,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => time(),
    'updated_at' => time(),
    'created_by' => null,
    'updated_by' => null,
];
$collaborations[3] = [
    'id' => 3,
    'title' => 'Мебельные салоны',
    'description' => 'Также мебельная фабрика приглашает к сотрудничеству владельцев мебельных салонов у которых нет своего производства, монтажников и мебельные производства с неполным циклом.',
    'image' => null,
    'link' => null,
    'comment' => null,
    'sort' => 3,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => time(),
    'updated_at' => time(),
    'created_by' => null,
    'updated_by' => null,
];

return $collaborations;