<?php
use yii\widgets\ListView;

?>
<?= ListView::widget([
  'dataProvider' => $dataProvider,
  'itemView' => '//layouts/include/product/_list',
  'layout' => "{items}",
  'options' => [
    'tag' => false,
  ],
]);
?>
