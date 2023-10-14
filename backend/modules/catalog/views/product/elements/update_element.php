<?php

$this->title = Yii::t('app', 'Element Name: {name}', ['name' => $elementModel->name]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'CATALOG_MODULE'), 'url' => ['/catalog']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $elementModel->product->name, 'url' => ['update', 'id' => $elementModel->product->id]];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Elements: {name}', ['name' => $elementModel->product->name]), 'url' => ['elements', 'id' => $elementModel->product_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-elements-update">

    <?= $this->render('_element_form', [
        'model' => $model,
        'elementModel' => $elementModel,
    ]) ?>

</div>
