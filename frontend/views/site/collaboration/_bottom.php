<?php

use frontend\modules\content\models\Lead;
?>
<div class="about-us__item">
    <div class="about-us__item__title-wraper">
        <div class="parallax" style="background-image: url('/static/bonus.jpg');"></div>
        <h2 class="about-us__item__title">
            Бонус
        </h2>
        <a href="#about-us__item-bonus" class="about-us__item__to-content">
            <svg role="image" class="logo header__logo">
                <use xlink:href="/static/sprite.svg#arrow-down" />
            </svg>
        </a>
    </div>
</div>


<div class="about-us__item__content" id="about-us__item-bonus">
    <h2 class="about-us__item__content__title">
        Принимая решение о сотрудничестве с фабрикой «Altezza», Вы получаете:
    </h2>
    <div>
        <ul class="collaboration__bottom__item">
            <li>
                консультационную дизайнерскую поддержку (помощь в дизайне и подборе материала)
            </li>
            <li>
                технологическую поддержку (создание схем коммуникаций для ремонтных бригад, добавление заводских вырезов и пропилов, консультационная поддержка технолога)
            </li>
            <li>
                помощь и решение сложных вопросов любых технических вопросов от сборщиков во время монтажа.
            </li>
            <li>
                раскладки пленок, каталог фрезеровок и автоматизированную расчетную таблицу, для ускоренного просчета заказа и упрощения работы с клиентами.
            </li>
            <li>
                установку и обучение работе в комплексной программе К3 – мебель с возможностью полной проработки проекта
            </li>
        </ul>
    </div>
</div>
<?php $lead = new Lead(); ?>
<?= $this->render('//layouts/include/_contact_inline', ['lead' => $lead]); ?>