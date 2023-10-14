<?php

$this->title = Yii::t('app', 'About');
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="about-us">
  <?php if($abouts): ?>
    <?php foreach($abouts as $about): ?>
      <?= $this->render('_about', ['about' => $about]); ?>
    <?php endforeach; ?>
  <?php endif; ?>
</section>