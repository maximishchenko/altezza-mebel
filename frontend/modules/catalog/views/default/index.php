<?php 

$this->title = Yii::t('app', 'Catalog');
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="catalog-wrapper">
  
    <?= $this->render('_search', ['dataProvider' => $dataProvider, 'searchModel' => $searchModel]); ?>

    <button class="button catalog-filter-button">
      <svg role="image">
        <use xlink:href="/static/sprite.svg#filter" />
      </svg>
    </button>
    <section class="catalog">
    
    <div class="catalog__sort-wraper" id="filter__labels">
      <?= $this->render('_sort', []); ?>
      <?= $this->render('_filter', ['searchModel' => $searchModel]); ?>
    </div>

    <ul class="catalog__list">
    <?= Yii::$app->controller->renderPartial('//layouts/include/product/_productLoop', ['dataProvider' => $dataProvider]); ?>
    </ul>

    <div 
      id="showMore" 
      class="hidden__service" 
      data-page="<?= (int)Yii::$app->request->get('page', 1); ?>" 
      data-page-count="<?= (int)$dataProvider->pagination->pageCount; ?>" 
      data-csrf-token="<?= Yii::$app->request->csrfToken; ?>" 
      data-csrf-param="<?= Yii::$app->request->csrfParam; ?>"
    >
      <?= Yii::t('app', 'Show more'); ?>
    </div>

  </section>
</div>