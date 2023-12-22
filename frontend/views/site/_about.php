<?php

use yii\helpers\Html;
?>

<div class="about-us__item">
    <div class="about-us__item__title-wraper">
        <div class="parallax" style="background-image: url(<?= $about->thumb; ?>);"></div>
        <h2 class="about-us__item__title">
            <?= $about->title?>
        </h2>
        <a href="#about-us__item<?= $about->id; ?>" class="about-us__item__to-content">
            <svg role="image" class="logo header__logo">
                <use xlink:href="/static/sprite.svg#arrow-down" />
            </svg>
        </a>
    </div>
    <div class="about-us__item__content" id="about-us__item<?= $about->id; ?>">
        <h3 class="about-us__item__content__title">
            <?= $about->title?>
        </h3>
        <?= $about->description; ?>
      
        <?php if(isset($toAbout) && !empty($toAbout)): ?>
            <?= Html::a(Yii::t('app', "More info"), ['/about'], ['class' => "button button--dark button--small"]); ?>
        <?php elseif($about->link): ?>
            <?= Html::a(Yii::t('app', "More info"), $about->link, ['class' => "button button--dark button--small"]); ?>
        <?php endif; ?>
    </div>
</div>