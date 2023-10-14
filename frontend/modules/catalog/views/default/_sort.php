<?php

use common\models\SearchForm;
?>
<select form="searchForm" name="sort" onchange="this.form.submit();" class="catalog__sort js-catalog-sort">
    <option value="" disabled selected>сортировка</option>
    <option value="view_count" <?= SearchForm::isSelectSearchParamSelected('sort', 'view_count'); ?> >по популярности</option>
    <option value="-formName" <?= SearchForm::isSelectSearchParamSelected('sort', '-formName'); ?> >по форме кухни</option>
    <option value="styleName" <?= SearchForm::isSelectSearchParamSelected('sort', 'styleName'); ?> >по стилю</option>
</select>