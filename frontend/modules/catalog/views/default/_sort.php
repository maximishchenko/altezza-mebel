<?php

use common\models\SearchForm;
?>
 <!-- onchange="this.form.submit();" -->
<select form="searchForm" name="sort" class="catalog__sort js-catalog-sort">
    <option value="" disabled selected>сортировка</option>
    <option value="view_count" <?= SearchForm::isSelectSearchParamSelected('sort', 'view_count'); ?> >
        <?= Yii::t('app', 'By popularity'); ?>
    </option>
    <option value="-formName" <?= SearchForm::isSelectSearchParamSelected('sort', '-formName'); ?> >
        <?= Yii::t('app', 'By form'); ?>
    </option>
    <option value="styleName" <?= SearchForm::isSelectSearchParamSelected('sort', 'styleName'); ?> >
        <?= Yii::t('app', 'By style'); ?>
    </option>
</select>