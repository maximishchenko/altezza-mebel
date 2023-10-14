<?php

$this->title = Yii::t('app', 'Add new Record');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'CATALOG_MODULE'), 'url' => ['/catalog']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Property Fasad Coatings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="property-fasad-coating-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
