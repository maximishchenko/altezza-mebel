
<?php if (isset($sliders) && !empty($sliders)): ?>
<div class="swiper js-slider-promo promo-slider">
  <!-- Additional required wrapper -->
  <div class="swiper-wrapper">
    <!-- Slides -->
    <?php foreach($sliders as $slider): ?>
    <div class="promo-slider__item swiper-slide" style="background-image: url(<?= $slider->thumb; ?>); ">
      <div class="promo-slider__item__text">
        <?= $slider->description; ?>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
  <!-- If we need pagination -->
  <div class="swiper-pagination"></div>

  <!-- If we need navigation buttons -->
  <div class="swiper-button-prev"></div>
  <div class="swiper-button-next"></div>

  <!-- If we need scrollbar -->
  <!-- <div class="swiper-scrollbar"></div> -->
</div>
<?php endif; ?>