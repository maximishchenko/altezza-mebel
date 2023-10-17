<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

$this->title = Yii::t('app', 'Login');
?>
<div class="site-login">

    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

        <?= $form->field($model, 'username', ['template' => '{input}{error}'])->textInput(['autofocus' => true, 'placeholder' => $model->getAttributeLabel('username')]) ?>

        <?= $form->field($model, 'password', ['template' => '{input}{error}'])->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>

        <?= $form->field($model, 'rememberMe')->checkbox() ?>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Login'), ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
        </div>

    <?php ActiveForm::end(); ?>
</div>