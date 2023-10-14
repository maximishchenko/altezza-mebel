<?php

$this->title = Yii::t('app', 'Add new Record');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'CATALOG_MODULE'), 'url' => ['/catalog']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['update', 'id' => $model->id]];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Elements: {name}', ['name' => $model->name]), 'url' => ['elements', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-elements-create">

    <?= $this->render('_element_form', [
        'model' => $model,
        'elementModel' => $elementModel,
    ]) ?>

</div>
