<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\modules\content\models\Collaboration $model */

$this->title = Yii::t('app', 'Add new Record');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'CONTENT_MODULE'), 'url' => ['/content']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Collaborations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="collaboration-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
