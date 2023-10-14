<?php

$this->title = Yii::t('app', 'Update About: {name}', [
    'name' => $model->title,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'CONTENT_MODULE'), 'url' => ['/content']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Abouts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="about-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
