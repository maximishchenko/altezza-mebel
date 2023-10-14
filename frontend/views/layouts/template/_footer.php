<h2 class="footer__title">
  <?= Yii::t('app', 'Processing Orders'); ?>
</h2>
<div class="footer__content">
    
  
  <?php if(Yii::$app->configManager->getItemValue('contactAddress')): ?>
  <div class="footer__content__item">
    <div class="footer__content__item__title">
      <?= Yii::t('app', 'Address'); ?>
    </div>
    <?= Yii::$app->configManager->getItemValue('contactAddress'); ?>
  </div>
  <?php endif; ?>
  
  <?php if(Yii::$app->configManager->getItemValue('contactWorktime')): ?>
  <div class="footer__content__item">
    <div class="footer__content__item__title">
    <?= Yii::t('app', 'Work Time'); ?>
    </div>
    <?= Yii::$app->configManager->getItemValue('contactWorktime'); ?>
  </div>
  <?php endif; ?>

  <address class="footer__content__item contacts contacts--footer">

    <?php if(Yii::$app->configManager->getItemValue('contactPhone')): ?>
      <div class="contacts__phone">
        <?= Yii::$app->configManager->getItemValue('contactPhone'); ?>
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

    <?php if(Yii::$app->configManager->getItemValue('contactEmail')): ?>
      <a href="mailto://<?= Yii::$app->configManager->getItemValue('contactEmail'); ?>" class="contacts__e-mail">
        e-mail: <?= Yii::$app->configManager->getItemValue('contactEmail'); ?>
      </a>
    <?php endif; ?>
  </address>
</div>