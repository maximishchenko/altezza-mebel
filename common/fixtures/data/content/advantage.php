<?php

use common\models\Sort;
use common\models\Status;

$advantages = [];
$advantages[1] = [
    'id' => 1,
    'title' => 'Инженерная проработка',
    'description' => 'Техническая поддержка проекта от проектирования до установки',
    'image' => null,
    'comment' => null,
    'sort' => Sort::DEFAULT_SORT_VALUE,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => time(),
    'updated_at' => time(),
]; 
$advantages[2] = [
    'id' => 2,
    'title' => 'Любые размеры',
    'description' => 'Адаптируем любые дизайнерские решения под ваше помещение',
    'image' => null,
    'comment' => null,
    'sort' => Sort::DEFAULT_SORT_VALUE,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => time(),
    'updated_at' => time(),
]; 
$advantages[3] = [
    'id' => 3,
    'title' => 'Гарантия',
    'description' => 'Гарантия на фасады - 5 лет, на корпус - 2 года',
    'image' => null,
    'comment' => null,
    'sort' => Sort::DEFAULT_SORT_VALUE,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => time(),
    'updated_at' => time(),
]; 
$advantages[4] = [
    'id' => 4,
    'title' => 'Гибкие цены',
    'description' => 'Возможность изготовления кухни в 3-х категориях: эконом, средний и премиум',
    'image' => null,
    'comment' => null,
    'sort' => Sort::DEFAULT_SORT_VALUE,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => time(),
    'updated_at' => time(),
]; 

return $advantages;