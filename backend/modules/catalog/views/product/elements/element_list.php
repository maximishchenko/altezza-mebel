<?php

use backend\widgets\SetColumn;
use common\models\Status;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

$this->title = Yii::t('app', 'Product Elements: {name}', ['name' => $model->name]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'CATALOG_MODULE'), 'url' => ['/catalog']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['update', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('../_tabs_update', ['model' => $model]); ?>

<p class="text-right">
    <?= Html::a(Yii::t('app', 'Add Record'), ['create-element', 'id' => $model->id], ['class' => 'btn btn-success btn-sm']); ?>
    <?= Html::a(Yii::t('app', 'Refresh Page'), ['index'], ['class' => 'btn btn-info btn-sm']); ?>
</p>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'attribute' => 'id',
            'contentOptions' => ['style' => 'width:100px;'],
        ],
        [
            'attribute' => 'name',
            'contentOptions' => ['class' => 'text-wrap'],
            'format' => 'raw',
            'value' => function($data) {
                return Html::a($data->name, ['update-element', 'elementId' => $data->id, []]);
            }
        ],
        [
            'attribute' => 'x_pos',
            'format' => 'raw',
            'value' => function ($data) {
                return $data->x_pos . "%";
            }
        ],
        [
            'attribute' => 'y_pos',
            'format' => 'raw',
            'value' => function ($data) {
                return $data->y_pos . "%";
            }
        ],
        'sort',
        [
            'class' => SetColumn::className(),
            'filter' => Status::getStatusesArray(),
            'attribute' => 'status',
            'name' => function($data) {
                return ArrayHelper::getValue(Status::getStatusesArray(), $data->status);
            },
            'contentOptions' => ['style' => 'width:100px;'],
            'cssCLasses' => [
                Status::STATUS_ACTIVE => 'success',
                Status::STATUS_BLOCKED => 'danger',
            ],
        ],
        [
            'class' => ActionColumn::className(),
            'contentOptions' => ['style' => 'width:80px;'],
            'template' => '{delete-element}',
            'buttons' => [
                'delete-element' => function ($url, $model) {
                    return Html::a('<i class="fa fa-trash"></i>', ['delete-element', 'elementId' => $model->id], [
                        'title' => Yii::t('app', 'lead-delete'),
                        'data' => [
                            'method' => 'post',
                            'confirm' => Yii::t('app', 'Do delete answer'),
                        ]
                    ]);
                },
            ],
        ],
    ],
]); ?>