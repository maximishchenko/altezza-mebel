<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>

<a href="<?= Url::toRoute('/catalog/' . $model->slug); ?>">
    <li class="catalog__list__item">
        <div class="catalog__img">
        <?= Html::img($model->thumb, ['class' => 'catalog__list__item__img', 'alt' => $model->type->name, 'loading' => 'lazy']); ?>
        <?php if($model->images): ?>
            <?php foreach($model->images as $image): ?>
                <?= Html::img($image->thumb, ['class' => 'catalog__list__item__img', 'alt' => $model->type->name, 'loading' => 'lazy']); ?>
            <?php endforeach; ?>
        <?php endif; ?>
        </div>
        <div class="catalog__list__item__name">
            <?= $model->name; ?>
        </div>
        <ul class="kitchen-characteristics">
            <li class="kitchen-characteristics__item">
                <div class="kitchen-characteristics__item__name">
                    <?= Yii::t('app', 'Product Type String'); ?>
                </div>
                <div class="kitchen-characteristics__item__value">
                    <?= $model->type->name; ?>
                </div>
            </li>
            <li class="kitchen-characteristics__item">
                <div class="kitchen-characteristics__item__name">
                    <?= Yii::t('app', 'Product Form String'); ?>                
                </div>
                <div class="kitchen-characteristics__item__value">
                    <?= $model->form->name; ?>
                </div>
            </li>
            <li class="kitchen-characteristics__item">
                <div class="kitchen-characteristics__item__name">
                    <?= Yii::t('app', 'Product Style String'); ?>
                </div>
                <div class="kitchen-characteristics__item__value">
                    <?= $model->style->name; ?>
                </div>
            </li>
            <li class="kitchen-characteristics__item">
                <div class="kitchen-characteristics__item__name">
                    <?= Yii::t('app', 'Product Fasad Material String'); ?>
                </div>
                <div class="kitchen-characteristics__item__value">
                    <?= $model->getFasadMaterialsStringWithCount(); ?>
                </div>
            </li>
            <li class="kitchen-characteristics__item">
                <div class="kitchen-characteristics__item__name">
                    <?= Yii::t('app', 'Product Fasad Coating String'); ?>
                </div>
                <div class="kitchen-characteristics__item__value">
                    <?= $model->getFasadCoatingStringWithCount(); ?>
                </div>
            </li>
            <li class="kitchen-characteristics__item">
                <div class="kitchen-characteristics__item__name">
                    <?= Yii::t('app', 'Product Decorative Elements String'); ?>
                </div>
                <div class="kitchen-characteristics__item__value">
                    <?= $model->getDecorativeElementsStringWithCount(); ?>
                </div>
            </li>
        </ul>
        <button class="catalog__list__item__learn-more">
            <?= Yii::t('app', 'Display More'); ?>
            <svg role="image" class="catalog__list__item__learn-more__img">
                <use xlink:href="/static/sprite.svg#arrow-right" />
            </svg>
        </button>
    </li>
</a>