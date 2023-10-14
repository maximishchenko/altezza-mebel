<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'CONTENT_MODULE'), 'url' => ['/content']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Leads'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="lead-view">

    <p class="text-right">
        <?= Html::a(Yii::t('app', 'Go to list'), ['index'], ['class' => 'btn btn-sm btn-info']); ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'phone',
            'email:email',
            'subject',
            'body:ntext',
            'created_at:datetime',
        ],
    ]) ?>

</div>
