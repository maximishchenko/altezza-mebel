<?php

use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;

$this->title = Yii::t('app', 'Leads');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'CONTENT_MODULE'), 'url' => ['/content']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lead-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p class="text-right">
        <?= Html::a(Yii::t('app', 'Refresh Page'), ['index'], ['class' => 'btn btn-sm btn-info']); ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pager' => [
            'class' => 'yii\bootstrap4\LinkPager'
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            [
                'attribute' => 'id',
                'contentOptions' => ['style' => 'width:100px;'],
            ],
            [
                'attribute' => 'name',
                'format' => 'raw',
                'value' => function($data) {
                    return Html::a($data->name, ['view', 'id' => $data->id], []);
                }
            ],
            'phone',
            'email:email',
            'subject',

            [
                'class' => ActionColumn::className(),
                'contentOptions' => ['style' => 'width:80px;'],
                'template' => '{delete}',
            ],
        ],
    ]); ?>


</div>
