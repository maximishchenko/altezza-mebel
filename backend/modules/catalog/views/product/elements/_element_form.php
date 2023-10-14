<?php

use yii\bootstrap5\ActiveForm;
?>
<div class="product-form">

    <?php $form = ActiveForm::begin([
        'id' => 'product-element-form',
    ]); ?>
    <?= $form->errorSummary($elementModel, ['class' => 'alert alert-danger']); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($elementModel, 'name')->textInput(['maxlength' => true]) ?>
            <?= $form->field($elementModel, 'x_pos')->textInput(['maxlength' => true]) ?>
            <?= $form->field($elementModel, 'status')->checkbox() ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($elementModel, 'sort')->textInput(['type' => 'number']) ?>
            <?= $form->field($elementModel, 'y_pos')->textInput(['maxlength' => true]) ?>
            <?= $form->field($elementModel, 'comment')->textarea(['rows' => 12])->hint($elementModel->getAttributeHint('comment')) ?>
        </div>
    </div>



    <?php ActiveForm::end(); ?>
</div>
<?= $this->render('//layouts/forms/_buttons', ['formId' => 'product-element-form']); ?>
