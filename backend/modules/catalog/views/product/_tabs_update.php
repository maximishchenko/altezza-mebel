<?php

use backend\models\Tabs;
use yii\helpers\Html;

?>

<ul class="nav nav-tabs admin__tabs" style="margin-bottom: 30px !important;">

  <li class="nav-item">
    <?= Html::a(Yii::t("app", "Primary Block"), ['update', 'id' => $model->id], ['class' => Tabs::isActionActive(['update'])]); ?>
  </li>

  <li class="nav-item">
    <?= Html::a(Yii::t("app", "Product Element Block"), ['elements', 'id' => $model->id], ['class' => Tabs::isActionActive(['elements'])]); ?>
  </li>

</ul>