<?php

$this->title = Yii::t('app', 'Update Advantage: {name}', [
    'name' => $model->title,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'CONTENT_MODULE'), 'url' => ['/content']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Advantages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="advantage-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
