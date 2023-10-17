<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'Catalog {type} {name}', ['type' => $product->type->name,'name' => $product->name]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Catalog'), 'url' => ['/catalog']];
$this->params['breadcrumbs'][] = $this->title;

?>


<div class="product-card">
    <div class="product-card__slider">
        <div class="swiper product-card__slider__main js-slider-product-card-main">
            <div class="swiper-wrapper">
                <?php if($product->thumb): ?>
                    <div class="swiper-slide product-card__slider__main__item">
                        <?= Html::img($product->thumb, ['alt' => $product->name, 'data-fancybox' => 'product-card', 'data-src' => $product->thumb])?>
                    </div>
                <?php endif; ?>
                <?php if ($product->images): ?>
                    <?php foreach($product->images as $image): ?>
                        <div class="swiper-slide product-card__slider__main__item">
                            <?= Html::img($image->thumb, ['alt' => $product->name, 'data-fancybox' => 'product-card', 'data-src' => $image->thumb]); ?>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
        <div class="swiper product-card__slider__controller js-slider-product-card-controller">
            <div class="swiper-wrapper">
                <?php if($product->thumb): ?>
                    <div class="swiper-slide product-card__slider__controller__item">
                        <?= Html::img($product->thumb, ['alt' => $product->name])?>
                    </div>
                <?php endif; ?>
                <?php if ($product->images): ?>
                    <?php foreach($product->images as $image): ?>
                        <div class="swiper-slide product-card__slider__controller__item">
                            <?= Html::img($image->thumb, ['alt' => $product->name]); ?>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php if(isset($product->description) && !empty($product->description)): ?>
    <div class="product-card__menu">
        <div class="product-card__menu__item selected" data-menu-item="characteristics">
            <?= Yii::t('app', 'Characteristics'); ?>
        </div>
        <div class="product-card__menu__item" data-menu-item="description">
            <?= Yii::t('app', 'Description'); ?>
        </div>
    </div>
    <?php endif; ?>

    <div class="product-card__info">
        <div class="product-card__info__characteristics" data-menu-item-content="characteristics">
            <ul class="kitchen-characteristics">
                <li class="kitchen-characteristics__item">
                    <div class="kitchen-characteristics__item__name">
                        <?= Yii::t('app', 'Product Type'); ?>
                    </div>
                    <div class="kitchen-characteristics__item__value">
                        <?= $product->type->name; ?>
                    </div>
                </li>
                <li class="kitchen-characteristics__item">
                    <div class="kitchen-characteristics__item__name">
                        <?= Yii::t('app', 'Product Form String'); ?>
                    </div>
                    <div class="kitchen-characteristics__item__value">
                        <?= $product->form->name; ?>
                    </div>
                </li>
                <li class="kitchen-characteristics__item">
                    <div class="kitchen-characteristics__item__name">
                        <?= Yii::t('app', 'Product Style String'); ?>
                    </div>
                    <div class="kitchen-characteristics__item__value">
                        <?= $product->style->name; ?>
                    </div>
                </li>
                <li class="kitchen-characteristics__item">
                    <div class="kitchen-characteristics__item__name">
                        <?= Yii::t('app', 'Fasad Materials'); ?>
                    </div>
                    <div class="kitchen-characteristics__item__value">
                        <?= $product->getFasadMaterialsString(); ?>
                    </div>
                </li>
                <li class="kitchen-characteristics__item">
                    <div class="kitchen-characteristics__item__name">
                        <?= Yii::t('app', 'Fasad Coatings'); ?>
                    </div>
                    <div class="kitchen-characteristics__item__value">
                        <?= $product->getFasadCoatingString(); ?>
                    </div>
                </li>
                <li class="kitchen-characteristics__item">
                    <div class="kitchen-characteristics__item__name">
                        <?= Yii::t('app', 'Decorative Elements'); ?>
                    </div>
                    <div class="kitchen-characteristics__item__value">
                        <?= $product->getDecorativeElementsString(); ?>
                    </div>
                </li>
            </ul>
            <ul class="kitchen-characteristics">
                <li class="kitchen-characteristics__item">
                    <div class="kitchen-characteristics__item__name">
                        <?= Yii::t('app', 'Body Materials'); ?>
                    </div>
                    <div class="kitchen-characteristics__item__value">
                        <?= $product->getBodyMaterialsString(); ?>
                    </div>
                </li>
                <li class="kitchen-characteristics__item">
                    <div class="kitchen-characteristics__item__name">
                        <?= Yii::t('app', 'Furniture'); ?>
                    </div>
                    <div class="kitchen-characteristics__item__value">
                        <?= $product->getFurnitureString(); ?>
                    </div>
                </li>
                <li class="kitchen-characteristics__item">
                    <div class="kitchen-characteristics__item__name">
                        <?= Yii::t('app', 'Backlight'); ?>
                    </div>
                    <div class="kitchen-characteristics__item__value">
                        <?= $product->getBacklightsString(); ?>
                    </div>
                </li>
                <li class="kitchen-characteristics__item">
                    <div class="kitchen-characteristics__item__name">
                        <?= Yii::t('app', 'Table Top'); ?>
                    </div>
                    <div class="kitchen-characteristics__item__value">
                        <?= $product->getTableTopsString(); ?>
                    </div>
                </li>
                <li class="kitchen-characteristics__item">
                    <div class="kitchen-characteristics__item__name">
                        <?= Yii::t('app', 'Appliance'); ?>
                    </div>
                    <div class="kitchen-characteristics__item__value">
                        <?= $product->appliancesString(); ?>
                    </div>
                </li>
            </ul>
        </div>
        
        <div class="product-card__info__description" data-menu-item-content="description">
            <?= $product->description; ?>
        </div>

        <button class="product-card__info__button button button--dark js-send-request">
            <?= Yii::t('app', 'Send Callback'); ?>
        </button>
    </div>
</div>

<?= $this->render("//layouts/include/_detailing", ['product' => $product]); ?>

<?= $this->render('//layouts/include/_contact_inline', ['lead' => $lead]); ?>


<section class="catalog catalog--recommendations">
  <h2 class="catalog__title">
    <?= Yii::t('app', 'This may be interested for you'); ?>
  </h2>
  <div class="swiper js-slider-recommendations">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">

      <!-- Slides -->
    <?= $this->render('//layouts/include/_slide_list', ['products' => $popularProducts]); ?>

    </div>
  </div>
</section>