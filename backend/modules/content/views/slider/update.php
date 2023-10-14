<?php

$this->title = Yii::t('app', 'Update Slider: {name}', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'CONTENT_MODULE'), 'url' => ['/content']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sliders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slider-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
