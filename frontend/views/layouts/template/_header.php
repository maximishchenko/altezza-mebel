<?php
use yii\helpers\Html;
use yii\helpers\Url;

?>

<a href="<?= Yii::$app->homeUrl; ?>">
  <svg role="image" class="logo header__logo">
    <use xlink:href="/static/sprite.svg#Logo" />
  </svg>
</a>
<nav class="nav-menu js-nav-menu">
  <menu class="nav-menu__list">
    <li class="nav-menu__list__item">
      <?= Html::a(Yii::t('app', 'About Us'), ['/about'], []); ?>
    </li>
    <li class="nav-menu__list__item">
      <?= Html::a(Yii::t('app', 'Catalog'), ['/catalog'], []); ?>
    </li>
    <!-- <li class="nav-menu__list__item"> -->
      <?php // echo Html::a(Yii::t('app', 'Gallery'), ['/gallery'], []); ?>
    <!-- </li> -->
    <li class="nav-menu__list__item">
      <?= Html::a(Yii::t('app', 'Collaboration'), ['/collaboration'], []); ?>
    </li>
    <li class="nav-menu__list__item">
      <?php // echo Html::a(Yii::t('app', 'FAQ'), [Url::to(['#' => 'FAQ'], true)], []); ?>
      <a href="#FAQ">
        <?= Yii::t('app', 'FAQ'); ?>
      </a>
    </li>
  </menu>
</nav>
<div class="row-wraper">
  <address class="contacts header__contacts">   

    <?php if(Yii::$app->configManager->getItemValue('contactPhone')): ?>
    <div class="contacts__phone">
      <a href="tel:/<?= Yii::$app->configManager->getItemValue('contactPhone'); ?>">
        <?= Yii::$app->configManager->getItemValue('contactPhone'); ?>
      </a>
    </div>
    <?php endif; ?>

    <?php if(Yii::$app->configManager->getItemValue('contactWhatsapp')): ?>
    <a href="<?= Yii::$app->configManager->getItemValue('contactWhatsapp'); ?>">
        <svg role="image" class="icon">
            <use xlink:href="/static/sprite.svg#whatsapp" />
        </svg>
    </a>
    <?php endif; ?>

    <?php if(Yii::$app->configManager->getItemValue('contactTelegram')): ?>
      <a href="<?= Yii::$app->configManager->getItemValue('contactTelegram'); ?>">
        <svg role="image" class="icon">
            <use xlink:href="/static/sprite.svg#tg" />
        </svg>
      </a>
    <?php endif; ?>

    <?php if(Yii::$app->configManager->getItemValue('contactVk')): ?>
    <a href="<?= Yii::$app->configManager->getItemValue('contactVk'); ?>">
        <svg role="image" class="icon">
            <use xlink:href="/static/sprite.svg#vk" />
        </svg>
    </a>
    <?php endif; ?>

  </address>
  <button class="button nav-menu-button js-nav-menu-button">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="black">
      <path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"></path>
    </svg>
  </button>
</div>