<?php

$this->title = Yii::t('app', 'Update Property: {name}', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'CATALOG_MODULE'), 'url' => ['/catalog']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Property Furniture'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="property-furniture-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
