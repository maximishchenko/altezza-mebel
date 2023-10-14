<?php

$leads = [];
$leads[1] = [
    'id' => 1,
    'name' => 'Иванов Иван Иванович',
    'phone' => '+71234567890',
    'email' => null,
    'subject' => 'Сообщение формы обратной связи',
    'body' => 'Хочу кухню',
    'created_at' => time(),
]; 
$leads[2] = [
    'id' => 2,
    'name' => 'Петров П.П.',
    'phone' => '+79876543210',
    'email' => null,
    'subject' => 'Сообщение формы обратной связи',
    'body' => 'Хочу в отпуск',
    'created_at' => time(),
]; 


return $leads;