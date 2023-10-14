<?php
use yii\helpers\Html;
?>
<?php if($product->image && $product->elements): ?>
<div class="kitchen-details">
    <?= Html::img($product->thumb, ['class' => 'kitchen-details__img', 'alt' => $product->name]); ?>

    <?php foreach($product->elements as $element): ?>
        <div class="kitchen-details__item" style="left: calc(<?= $element->x_pos; ?>% - 20px); top: calc(<?= $element->y_pos; ?>% - 20px);">
            <div class="kitchen-details__item__point">
                <div class="cross"></div>
            </div>
            <div class="kitchen-details__item__label">
                <div class="kitchen-details__item__label__text">
                    <?= $element->name; ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?php endif; ?>