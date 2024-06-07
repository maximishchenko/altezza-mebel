<?php
use yii\widgets\ListView;

$this->title = Yii::t('app', 'Gallery');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="gallery__list">

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '//layouts/include/_gallery_item',
        'layout' => "{items}",
        'options' => [
            'tag' => false,
        ],
    ]);
    ?>
</div>
