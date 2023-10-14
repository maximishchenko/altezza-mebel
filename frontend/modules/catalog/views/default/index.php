<?php 

$this->title = Yii::t('app', 'Catalog');
$this->params['breadcrumbs'][] = $this->title;

use yii\widgets\LinkPager;
use yii\widgets\ListView;

?>

<div class="catalog-wrapper">
  
    <?= $this->render('_search', ['dataProvider' => $dataProvider, 'searchModel' => $searchModel]); ?>

    <button class="button catalog-filter-button">
      <svg role="image">
        <use xlink:href="/static/sprite.svg#filter" />
      </svg>
    </button>
    <section class="catalog">
    
    <div class="catalog__sort-wraper">
      <?= $this->render('_sort', []); ?>
      <?= $this->render('_filter', ['searchModel' => $searchModel]); ?>
    </div>

    <?= ListView::widget([
      'dataProvider' => $dataProvider,
      'itemView' => '_list',
      'layout' => "{items}",

      'options' => [
          'tag' => 'ul',
          'class' => 'catalog__list',
      ],
    ]);

    ?>

    <?= LinkPager::widget([
      'pagination' => $dataProvider->pagination,
      'activePageCssClass' => 'pagination-nav__active',
      'disabledPageCssClass' => 'disabled',
      'pageCssClass' => 'pagination-nav__item button--light',
      'prevPageCssClass' => 'pagination-nav__item pagination-nav__prev button--light',
      'nextPageCssClass' => 'pagination-nav__item pagination-nav__next button--light',
      'nextPageLabel' => '',
      'prevPageLabel' => '',
      'options' => [
          'tag' => 'ul',
          'class' => 'pagination-nav',
      ],
      'registerLinkTags' => true
    ]); ?>

  </section>
</div>