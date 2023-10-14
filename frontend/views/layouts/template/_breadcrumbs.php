<?php
use yii\widgets\Breadcrumbs;
?>
<div class="bread-crumse">
    <?= Breadcrumbs::widget([
        'itemTemplate' => "<li class=\"bread-crumse__list__item\">{link}</li>",
        'activeItemTemplate' => "<li class=\"bread-crumse__list__item\">{link}</li>",
        'options' => [
            'class' => 'bread-crumse__list', 
        ],
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
</div>