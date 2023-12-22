<?php

$this->title = Yii::t('app', 'Collaboration');
$this->params['breadcrumbs'][] = $this->title;
?>


<section class="collaboration">
    <?= $this->render('collaboration/_top'); ?>
  <?php if(isset($collaborations) && !empty($collaborations)): ?>
    <?php foreach($collaborations as $collaboration): ?>
      <?= $this->render('collaboration/_collaboration', ['collaboration' => $collaboration]); ?>
    <?php endforeach; ?>
  <?php endif; ?>
    <?= $this->render('collaboration/_bottom'); ?>
</section>