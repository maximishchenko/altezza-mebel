<?php

use yii\helpers\Url;
use \hail812\adminlte\widgets\SmallBox;
?>
<div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <?= SmallBox::widget([
                'title' => Yii::t('app', 'Property Type'),
                'text' => Yii::t('app', 'Property Type Edit'),
                'icon' => 'fas fa-shopping-cart',
                'theme' => 'success',
                'linkText' => Yii::t('app', 'GO_LINK'),
                'linkUrl' => Url::to(['/catalog/property-type'])
            ]) ?>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <?= SmallBox::widget([
                'title' => Yii::t('app', 'Property Form'),
                'text' => Yii::t('app', 'Property Form Edit'),
                'icon' => 'fas fa-shopping-cart',
                'theme' => 'success',
                'linkText' => Yii::t('app', 'GO_LINK'),
                'linkUrl' => Url::to(['/catalog/property-form'])
            ]) ?>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <?= SmallBox::widget([
                'title' => Yii::t('app', 'Property Style'),
                'text' => Yii::t('app', 'Property Style Edit'),
                'icon' => 'fas fa-shopping-cart',
                'theme' => 'success',
                'linkText' => Yii::t('app', 'GO_LINK'),
                'linkUrl' => Url::to(['/catalog/property-style'])
            ]) ?>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <?= SmallBox::widget([
                'title' => Yii::t('app', 'Property Fasad Material'),
                'text' => Yii::t('app', 'Property Fasad Material Edit'),
                'icon' => 'fas fa-shopping-cart',
                'theme' => 'success',
                'linkText' => Yii::t('app', 'GO_LINK'),
                'linkUrl' => Url::to(['/catalog/property-fasad-material'])
            ]) ?>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <?= SmallBox::widget([
                'title' => Yii::t('app', 'Property Fasad Coating'),
                'text' => Yii::t('app', 'Property Fasad Coating Edit'),
                'icon' => 'fas fa-shopping-cart',
                'theme' => 'success',
                'linkText' => Yii::t('app', 'GO_LINK'),
                'linkUrl' => Url::to(['/catalog/property-fasad-coating'])
            ]) ?>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <?= SmallBox::widget([
                'title' => Yii::t('app', 'Property Decorative Element'),
                'text' => Yii::t('app', 'Property Decorative Element Edit'),
                'icon' => 'fas fa-shopping-cart',
                'theme' => 'success',
                'linkText' => Yii::t('app', 'GO_LINK'),
                'linkUrl' => Url::to(['/catalog/property-decorative-element'])
            ]) ?>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <?= SmallBox::widget([
                'title' => Yii::t('app', 'Property Body Material'),
                'text' => Yii::t('app', 'Property Body Material Edit'),
                'icon' => 'fas fa-shopping-cart',
                'theme' => 'success',
                'linkText' => Yii::t('app', 'GO_LINK'),
                'linkUrl' => Url::to(['/catalog/property-body-material'])
            ]) ?>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <?= SmallBox::widget([
                'title' => Yii::t('app', 'Property Furniture'),
                'text' => Yii::t('app', 'Property Furniture Edit'),
                'icon' => 'fas fa-shopping-cart',
                'theme' => 'success',
                'linkText' => Yii::t('app', 'GO_LINK'),
                'linkUrl' => Url::to(['/catalog/property-furniture'])
            ]) ?>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <?= SmallBox::widget([
                'title' => Yii::t('app', 'Property Backlight'),
                'text' => Yii::t('app', 'Property Backlight Edit'),
                'icon' => 'fas fa-shopping-cart',
                'theme' => 'success',
                'linkText' => Yii::t('app', 'GO_LINK'),
                'linkUrl' => Url::to(['/catalog/property-backlight'])
            ]) ?>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <?= SmallBox::widget([
                'title' => Yii::t('app', 'Property Table Top'),
                'text' => Yii::t('app', 'Property Table Top Edit'),
                'icon' => 'fas fa-shopping-cart',
                'theme' => 'success',
                'linkText' => Yii::t('app', 'GO_LINK'),
                'linkUrl' => Url::to(['/catalog/property-table-top'])
            ]) ?>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <?= SmallBox::widget([
                'title' => Yii::t('app', 'Property Appliance'),
                'text' => Yii::t('app', 'Property Appliance Edit'),
                'icon' => 'fas fa-shopping-cart',
                'theme' => 'success',
                'linkText' => Yii::t('app', 'GO_LINK'),
                'linkUrl' => Url::to(['/catalog/property-appliance'])
            ]) ?>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <?= SmallBox::widget([
                'title' => Yii::t('app', 'Product Nomenclature'),
                'text' => Yii::t('app', 'Product Nomenclature Edit'),
                'icon' => 'fas fa-shopping-cart',
                'theme' => 'info',
                'linkText' => Yii::t('app', 'GO_LINK'),
                'linkUrl' => Url::to(['/catalog/product'])
            ]) ?>
        </div>
</div>