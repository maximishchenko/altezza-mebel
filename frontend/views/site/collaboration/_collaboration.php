<?php

use yii\helpers\Html;
?>

<div class="about-us__item">
    <div class="about-us__item__title-wraper">
        <div class="parallax" style="background-image: url(<?= $collaboration->thumb; ?>);"></div>
        <h2 class="about-us__item__title">
            <?= $collaboration->title?>
        </h2>
        <a href="#about-us__item<?= $collaboration->id; ?>" class="about-us__item__to-content">
            <svg role="image" class="logo header__logo">
                <use xlink:href="/static/sprite.svg#arrow-down" />
            </svg>
        </a>
    </div>
    <div class="about-us__item__content" id="about-us__item<?= $collaboration->id; ?>">
        <h3 class="about-us__item__content__title">
            <?= $collaboration->title?>
        </h3>
        <div style="text-align: center; ">
            <?= $collaboration->description; ?>
        </div>

        <?php if(isset($toCollaboration) && !empty($toCollaboration)): ?>
            <?= Html::a(Yii::t('app', "More info"), ['/about'], ['class' => "button button--dark button--small"]); ?>
        <?php elseif($collaboration->link): ?>
            <?= Html::a(Yii::t('app', "More info"), $collaboration->link, ['class' => "button button--dark button--small"]); ?>
        <?php endif; ?>
        <?= Html::button(Yii::t('app', 'Send Callback Request a call'), ['class' => 'product-card__info__button button button--dark js-send-request']); ?>
    </div>
</div>