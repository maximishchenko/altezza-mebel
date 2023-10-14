<?php
use yii\helpers\Html;
?>
<?php if(isset($advantages) && !empty($advantages)): ?>
<section class="advantages swiper js-slider-advantages">
  <div class="swiper-wrapper">
    <?php foreach($advantages as $advantage): ?>
    <div class="advantages__item swiper-slide">
      <!-- <img src="" alt="" class="advantages__item__img"> -->
      <?= Html::img($advantage->thumb, ['class' => "advantages__item__img"]); ?>
      <h3 class="advantages__item__title">
        <?= $advantage->title; ?>
      </h3>
      <div class="advantages__item__description">
        <?= $advantage->description; ?>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
</section>
<?php endif; ?>