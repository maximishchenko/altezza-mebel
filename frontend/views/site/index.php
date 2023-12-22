<?php


// $this->title = 'Altezza';
?>

    <?= $this->render('//layouts/include/_slider', ['sliders' => $sliders]); ?>

    <?= $this->render('//layouts/include/_advantage', ['advantages' => $advantages]); ?>
    <?php if($about): ?>
      <?= $this->render('_about', ['about' => $about, 'toAbout' => true]); ?>
    <?php endif; ?>

    <?php if($newProducts): ?>
    <section class="catalog catalog--new">
      <h2 class="catalog__title">
        <?= Yii::t('app', 'New Product'); ?>
      </h2>
      <div class="swiper js-slider-new">
        <div class="swiper-wrapper">
          <!-- Slides -->
          <?= $this->render('//layouts/include/_slide_list', ['products' => $newProducts]); ?>
        </div>
      </div>
    </section>
    <?php endif; ?>





  </main>