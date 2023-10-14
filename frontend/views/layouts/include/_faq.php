<?php if(isset($questions) && !empty($questions)): ?>

<section class="faq" id="FAQ">
  <h2 class="faq__title">
    <?= Yii::t('app', 'Question section title'); ?>
  </h2>
  <div class="faq__lists-wraper">
    
    <?php $count = round(count($questions)/2); ?>
      <?php foreach($questions as $index => $question): ?>
        <?php if($index == 0 || $index == $count): ?>
          <menu class="faq__list">
        <?php endif; ?>

        <li class="faq__list__item">
          <details>
            <summary class="faq__list__item__question">
              <?= $question->question; ?>
            </summary>
            <div class="faq__list__item__answer">
              <?= $question->answer; ?>
            </div>
          </details>
        </li>

        <?php if($index + 1 == $count || $index + 1 == count($questions)): ?>
          </menu>      
        <?php endif; ?>
      <?php endforeach; ?>
      
  </div>
</section>
<?php endif ;?>