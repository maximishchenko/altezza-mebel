<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>

<?php if($products): ?>
    <?php foreach($products as $product): ?>
        <a href="<?= Url::toRoute('/catalog/' . $product->slug);?>" class="swiper-slide catalog__list__item catalog__list__item--slider">
        
            <?php if ($product->is_new): ?>
            <div class="catalog__list__item__badge--wrapper">
                <span class="catalog__list__item__badge catalog__list__item__badge--sale">
                    <?= Yii::t('app', 'Is new product'); ?>
                </span>
            </div>
            <?php endif; ?>
            
            <?= Html::img($product->thumb, ['class' => 'catalog__list__item__img', 'alt' => $product->name]); ?>
            <div class="catalog__list__item__name">
                <?= $product->name; ?>
            </div>
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
                    <?= $product->getFasadMaterialsStringWithCount(); ?>
                </div>
            </li>
            <li class="kitchen-characteristics__item">
                <div class="kitchen-characteristics__item__name">
                    <?= Yii::t('app', 'Fasad Coatings'); ?>
                </div>
                <div class="kitchen-characteristics__item__value">
                    <?= $product->getFasadCoatingStringWithCount(); ?>
                </div>
            </li>
            <li class="kitchen-characteristics__item">
                <div class="kitchen-characteristics__item__name">
                    <?= Yii::t('app', 'Decorative Elements'); ?>
                </div>
                <div class="kitchen-characteristics__item__value">
                    <?= $product->getDecorativeElementsStringWithCount(); ?>
                </div>
            </li>
            </ul>
            <button class="catalog__list__item__learn-more">
                <?= Yii::t('app', 'Display More'); ?>
                <svg role="image" class="catalog__list__item__learn-more__img">
                    <use xlink:href="/static/sprite.svg#arrow-right" />
                </svg>
            </button>
        </a>
    <?php endforeach; ?>
<?php endif; ?>