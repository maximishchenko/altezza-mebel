<?php

use common\models\Sort;
use common\models\Status;

$sliders = [];
$sliders[1] = [
    'id' => 1,
    'name' => 'Мебель от производителя',
    'description' => 'Корпусная мебель по индивидуальным размерам',
    'image' => null,
    'comment' => null,
    'sort' => Sort::DEFAULT_SORT_VALUE,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => 1696516129,
    'updated_at' => 1696516129,
]; 
$sliders[2] = [
    'id' => 2,
    'name' => 'Мебель от хозяина',
    'description' => 'Корпусная мебель вместе с хозяином',
    'image' => null,
    'comment' => null,
    'sort' => Sort::DEFAULT_SORT_VALUE,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => 1696516129,
    'updated_at' => 1696516129,
]; 


return $sliders;