<?php
use yii\helpers\Html;
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
      <?= Html::a(Yii::t('app', 'FAQ'), ['#' => 'FAQ'], []); ?>
    </li>
  </menu>
</nav>
<div class="row-wraper">
  <address class="contacts header__contacts">   

    <?php if(Yii::$app->configManager->getItemValue('contactPhone')): ?>
    <div class="contacts__phone">
      <!-- TODO ссылка скрывает текст -->
      <?= Yii::$app->configManager->getItemValue('contactPhone'); ?>
    </div>
    <?php endif; ?>

    <?php if(Yii::$app->configManager->getItemValue('contactWhatsapp')): ?>
    <a href="<?= Yii::$app->configManager->getItemValue('contactWhatsapp'); ?>">
      <img src="/static/svg/whatsapp.svg" alt="whatsapp" class="icon">
    </a>
    <?php endif; ?>

    <?php if(Yii::$app->configManager->getItemValue('contactTelegram')): ?>
      <a href="<?= Yii::$app->configManager->getItemValue('contactTelegram'); ?>">
        <img src="/static/svg/telegram.svg" alt="telegram" class="icon">
      </a>
    <?php endif; ?>

  </address>
  <button class="button nav-menu-button js-nav-menu-button">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="black">
      <path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"></path>
    </svg>
  </button>
</div>