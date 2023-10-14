<?php

$this->title = Yii::t('app', 'Update Property: {name}', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'CATALOG_MODULE'), 'url' => ['/catalog']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Property Styles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="property-style-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
