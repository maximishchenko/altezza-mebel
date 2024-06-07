<?php

use yii\helpers\Url;
use \hail812\adminlte\widgets\SmallBox;
?>
<div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <?= SmallBox::widget([
                'title' => Yii::t('app', 'LEAD'),
                'text' => Yii::t('app', 'LEAD Edit'),
                'icon' => 'fas fa-cog',
                'theme' => 'warning',
                'linkText' => Yii::t('app', 'GO_LINK'),
                'linkUrl' => Url::to(['/content/lead'])
            ]) ?>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <?= SmallBox::widget([
                'title' => Yii::t('app', 'Galleries'),
                'text' => Yii::t('app', 'Gallery Edit'),
                'icon' => 'fas fa-cog',
                'theme' => 'warning',
                'linkText' => Yii::t('app', 'GO_LINK'),
                'linkUrl' => Url::to(['/content/gallery'])
            ]) ?>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <?= SmallBox::widget([
                'title' => Yii::t('app', 'SLIDER'),
                'text' => Yii::t('app', 'SLIDER Edit'),
                'icon' => 'fas fa-cog',
                'theme' => 'warning',
                'linkText' => Yii::t('app', 'GO_LINK'),
                'linkUrl' => Url::to(['/content/slider'])
            ]) ?>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <?= SmallBox::widget([
                'title' => Yii::t('app', 'ADVANTAGES'),
                'text' => Yii::t('app', 'ADVANTAGES Edit'),
                'icon' => 'fas fa-cog',
                'theme' => 'warning',
                'linkText' => Yii::t('app', 'GO_LINK'),
                'linkUrl' => Url::to(['/content/advantage'])
            ]) ?>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <?= SmallBox::widget([
                'title' => Yii::t('app', 'About'),
                'text' => Yii::t('app', 'About Edit'),
                'icon' => 'fas fa-cog',
                'theme' => 'warning',
                'linkText' => Yii::t('app', 'GO_LINK'),
                'linkUrl' => Url::to(['/content/about'])
            ]) ?>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <?= SmallBox::widget([
                'title' => Yii::t('app', 'Collaborations'),
                'text' => Yii::t('app', 'Collaborations Edit'),
                'icon' => 'fas fa-cog',
                'theme' => 'warning',
                'linkText' => Yii::t('app', 'GO_LINK'),
                'linkUrl' => Url::to(['/content/collaboration'])
            ]) ?>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <?= SmallBox::widget([
                'title' => Yii::t('app', 'QUESTIONS'),
                'text' => Yii::t('app', 'QUESTIONS Edit'),
                'icon' => 'fas fa-cog',
                'theme' => 'warning',
                'linkText' => Yii::t('app', 'GO_LINK'),
                'linkUrl' => Url::to(['/content/question'])
            ]) ?>
        </div>
</div>