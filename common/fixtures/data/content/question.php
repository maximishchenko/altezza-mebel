<?php

use common\models\Sort;
use common\models\Status;

$questions = [];
$questions[1] = [
    'id' => 1,
    'question' => 'Как подать рекламацию?',
    'answer' => 'Рекламация оформляется по форме Претензионного заявления (рекламации) и подается в Торговый отдел удобным для вас способом (E-mail, whatsapp, telegram). Рекламация обязательно включает в себя: 
    сведения о том, кто подает претензию;
    суть претензии (описание), подробное фото;
    дату составления;
    ссылку на договор и/или номер Заказа, по условиям выполнения которого пишется рекламация. ',
    'comment' => null,
    'sort' => Sort::DEFAULT_SORT_VALUE,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => time(),
    'updated_at' => time(),
]; 
$questions[2] = [
    'id' => 2,
    'question' => 'Будет ли заключен договор?',
    'answer' => 'Да, заключение договора между компанией и клиентом осуществляется всегда. Также оформляется спецификация в которой прописывается полное описание заказа, сроки и стоимость. ',
    'comment' => null,
    'sort' => Sort::DEFAULT_SORT_VALUE,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => time(),
    'updated_at' => time(),
];
$questions[3] = [
    'id' => 3,
    'question' => 'Как оформить заказ? ',
    'answer' => 'Заказ вы можете оформить любым удобным для вас способом: по e-mail, watsapp, telegram. Также вы можете позвонить нам и наш менеджер лично пожет вам в оформлении заказа ',
    'comment' => null,
    'sort' => Sort::DEFAULT_SORT_VALUE,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => time(),
    'updated_at' => time(),
];
$questions[4] = [
    'id' => 4,
    'question' => 'Возможно ли изготовление фрезеровки по эскизу? ',
    'answer' => 'Да, за счет наличия инженерного отдела мы можем изготавливать фасады по запросу клиентов. Для этого нам необходма фотография, чертеж или образец желаемого фаcада',
    'comment' => null,
    'sort' => Sort::DEFAULT_SORT_VALUE,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => time(),
    'updated_at' => time(),
];
$questions[5] = [
    'id' => 5,
    'question' => 'Как можно получить каталоги фрезеровок и пленок?',
    'answer' => 'Раскладки пленок и печатный каталог фрезеровок вы можете получить обратившись к своему менеджеру сопровождения или позвонив нам лично',
    'comment' => null,
    'sort' => Sort::DEFAULT_SORT_VALUE,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => time(),
    'updated_at' => time(),
];
$questions[6] = [
    'id' => 6,
    'question' => 'Какие кухни сейчас считаются модными?',
    'answer' => 'Современный дизайн не обладает совершенно конкретной географической привязкой. Поэтому, на кухне могут одинаково хорошо уживаться смесь этнических элементов и кантри, лофта и скандинавского наполнения в холодном, выдержанном в однотонном виде.',
    'comment' => null,
    'sort' => Sort::DEFAULT_SORT_VALUE,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => time(),
    'updated_at' => time(),
];
$questions[7] = [
    'id' => 7,
    'question' => 'С какими комплектующими вы работаете?',
    'answer' => 'Для того, чтобы быть максимально гибкими в ценообразовании мы работаем с разнообразными комплектующими: Bum, Firmax, Makmart, Unihopper. Также возможно изготволение мебели в трех вариантах ЛДСП: Увадрев, Egger, Kronospan.',
    'comment' => null,
    'sort' => Sort::DEFAULT_SORT_VALUE,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => time(),
    'updated_at' => time(),
];
$questions[8] = [
    'id' => 8,
    'question' => 'Сколько времени занимает изготовление кухни?',
    'answer' => 'Срок изготовления занимает от 14 дней и более, т.к. процесс зависит от сложности и масштаба проекта. Более точно по срокам изготовления могут сориентировать только менеджеры сопровождения после оценки самого проекта',
    'comment' => null,
    'sort' => Sort::DEFAULT_SORT_VALUE,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => time(),
    'updated_at' => time(),
];
$questions[9] = [
    'id' => 9,
    'question' => 'Как будет происходить работа над заказом?',
    'answer' => 'Сначала вам необходимо скинуть чертеж проекта менеджеру сопровождения. Он сделает расчет и визуализацию проекта. После заключения договора и внесения предоплаты 70% проект попадает инженеру-технологу, с которым вы также лично можете пообщаться. После согласования всех технических особенностей проект передается в производство',
    'comment' => null,
    'sort' => Sort::DEFAULT_SORT_VALUE,
    'status' => Status::STATUS_ACTIVE,
    'created_at' => time(),
    'updated_at' => time(),
];

return $questions;