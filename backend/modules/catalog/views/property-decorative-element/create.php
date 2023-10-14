<?php

$this->title = Yii::t('app', 'Add new Record');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'CATALOG_MODULE'), 'url' => ['/catalog']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Property Decorative Elements'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="property-decorative-element-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
