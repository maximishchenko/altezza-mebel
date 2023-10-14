<?php

use common\models\SearchForm;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<aside class="sidebar sidebar--catalog">
    <?php $form = ActiveForm::begin([
      'action' => ['index'],
      'id' => 'searchForm',
      'method' => 'get',
      'options' => [
        'class' => "catalog-filter",
      ],
      'enableAjaxValidation' => false,
      'enableClientValidation' => false,
      'enableClientScript' => false,
    ]);
    ?>
    <?php if($searchModel->formFilter): ?>
    <div class="catalog-filter__section">

        <div class="catalog-filter__section__title">
          <?= Yii::t('app', 'Filter Form Title'); ?>
        </div>

        <?php foreach($searchModel->formFilter as $form): ?>
          <div class="catalog-filter__section__item">
            <input
              type="checkbox" 
              name="form_id[]" 
              id="<?= $form->id; ?>-kitchen-shape--straight"
              class="filter-input"
              value="<?= $form->id; ?>"
              <?= SearchForm::isCheckboxSearchParamSelected('form_id', $form->id); ?>
            >
            <label for="<?= $form->id; ?>-kitchen-shape--straight" class="filter-label">
              <?= $form->name; ?>
            </label>
          </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <?php if($searchModel->styleFilter): ?>
    <div class="catalog-filter__section">
        <div class="catalog-filter__section__title">
          <?= Yii::t('app', 'Filter Style Title'); ?>
        </div>
        <?php foreach($searchModel->styleFilter as $style): ?>
        <div class="catalog-filter__section__item">
          <input
            type="checkbox" 
            name="style_id[]" 
            id="<?= $style->id; ?>-kitchen-style--minimalism"
            value="<?= $style->id; ?>"
            class="filter-input"
            <?= SearchForm::isCheckboxSearchParamSelected('style_id', $style->id); ?>
          >
          <label for="<?= $style->id; ?>-kitchen-style--minimalism" class="filter-label">
            <?= $style->name; ?>
          </label>
        </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <?php if($searchModel->coatingFilter): ?>
    <div class="catalog-filter__section">
        <div class="catalog-filter__section__title">
          Покрытие фасада
        </div>
        <?php foreach($searchModel->coatingFilter as $coating): ?>
        <div class="catalog-filter__section__item">
          <input
            type="checkbox" 
            name="coatingId[]" 
            id="<?= $coating->id; ?>-facade-covering--matte"
            value="<?= $coating->id; ?>"
            class="filter-input"
            <?= SearchForm::isCheckboxSearchParamSelected('coatingId', $coating->id); ?>
          >
          <label for="<?= $coating->id; ?>-facade-covering--matte" class="filter-label">
            <?= $coating->name; ?>
          </label>
        </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
    <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'button button--dark catalog-filter__section__submit']); ?>
    <?= Html::a(Yii::t('app', 'Reset Search Parameters'), ['/catalog'], ['class' => 'button button--light catalog-filter__section__reset']); ?>
  <?php ActiveForm::end(); ?>
</aside>