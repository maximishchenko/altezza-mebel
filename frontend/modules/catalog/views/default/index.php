<?php 

$this->title = Yii::t('app', 'Catalog');
$this->params['breadcrumbs'][] = $this->title;

?>

<style>
.loader {
  width: 96px;
  height: 96px;
  border-radius: 50%;
  display: inline-block;
  border-top: 4px solid #000;
  border-right: 4px solid transparent;
  box-sizing: border-box;
  animation: rotation 1s linear infinite;
  position: sticky;
  top: 300px;
}
.loader::after {
  content: '';  
  box-sizing: border-box;
  position: absolute;
  left: 0;
  top: 0;
  width: 96px;
  height: 96px;
  border-radius: 50%;
  border-left: 4px solid #FF3D00;
  border-bottom: 4px solid transparent;
  animation: rotation 0.5s linear infinite reverse;
}
.loader-wrapper {
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
  background-color: rgb(255,255,255,0.8);
  /* display: flex; */
  justify-content: center;
  z-index: 5;
  display: none;
}
.loader-wrapper.active {
  display: flex;
}
@keyframes rotation {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
} 
</style>

<div class="catalog-wrapper">
  
    <?= $this->render('_search', ['dataProvider' => $dataProvider, 'searchModel' => $searchModel]); ?>

    <button class="button catalog-filter-button">
      <svg role="image">
        <use xlink:href="/static/sprite.svg#filter" />
      </svg>
    </button>
    <section class="catalog">
    
    <div class="catalog__sort-wrapper" id="filter__labels">
      <?= $this->render('_sort', []); ?>
      <?= $this->render('_filter', ['searchModel' => $searchModel]); ?>
    </div>

    <ul class="catalog__list">
    <?= Yii::$app->controller->renderPartial('//layouts/include/product/_productLoop', ['dataProvider' => $dataProvider]); ?>
    </ul>

    <div class="loader-wrapper">
      <div class="loader"></div>
    </div>

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