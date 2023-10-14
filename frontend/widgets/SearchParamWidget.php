<?php

namespace frontend\widgets;

use common\models\Word;
use Yii;
use yii\base\Widget;

class SearchParamWidget extends Widget
{

    public $model;

    public $queryParams;

    public function init()
    {
        $this->queryParams = Yii::$app->request->queryParams;
        parent::init();
    }

    public function run()
    {
        $searchParamsArray = [];
        if(isset($this->queryParams) && !empty($this->queryParams)):
            foreach($this->queryParams as $attribute => $value):
                if ($this->model->isAttributeExists($attribute)):
                    array_push($searchParamsArray, $attribute);
    ?>
        
                <div class="swiper js-slider-picked-filters">
                    <ul class="swiper-wrapper catalog__picked-filters">
                        <li class="swiper-slide catalog__picked-filters__item single__search__param" data-search-attribute="<?= $this->formatDataSearchAttribute($attribute, $value); ?>" >
                        <?php if (is_array($value)): ?>
                            <?= Yii::t('app', 'Search Attribute {attribute}, Count: {count}', ['attribute' => $this->model->getAttributeLabel($attribute), 'count' => Word::numWord(count($value), Word::getValuesWordsArrayBasedOnCount())]); ?>
                        <?php else: ?>
                            <?= Yii::t('app', 'Search Attribute {attribute}', ['attribute' => $this->model->getAttributeLabel($attribute)]); ?>
                        <?php endif; ?>
                        </li>
                    </ul>
                </div>

    <?php
                endif; 
            endforeach;?>
        <?php if (!empty($searchParamsArray)): ?>    
        <li class="swiper-slide catalog__picked-filters__item filter-reset clear__search">
            <?= Yii::t('app', 'Reset filter labels'); ?>
        </li>
        <?php endif; ?>
    <?php endif; 
    }

    private function formatDataSearchAttribute($attribute, $value)
    {
        if (is_array($value)) {
            return $attribute . "[]";
        } else {
            return $attribute;
        }
    }
}