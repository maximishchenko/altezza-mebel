<?php

use frontend\modules\content\models\Lead;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
?>
<div class="request-wraper">
  <section class="request">

    <?php 
    $form = ActiveForm::begin([
        'id' => 'calback-form',
        'action' => ['/feedback'],
        'method' => 'post',
        'options' => [
          'class' => "request__form",
          'data-feedback-form' => '',
        ],
        'enableAjaxValidation' => false,
        'enableClientValidation' => false,
        'enableClientScript' => false,
    ]); 
    ?>

      <h2 class="request__title">
        <?= Yii::t('app', 'Please submit form for callback'); ?>
      </h2>

      <?= $form->field($lead, 'name', ['template' => '{input}'])->textInput(['placeholder' => $lead->getAttributeLabel('name'), 'class' => 'request__form__imput', 'required' => '']); ?>
      <?= $form->field($lead, 'phone', ['template' => '{input}'])->textInput(['placeholder' => $lead->getAttributeLabel('phone'), 'class' => 'request__form__imput', 'data-tel-input' => '', 'required' => '']); ?>
      
      <?= $form->field($lead, 'subject', ['template' => '{input}', 'options' => ['tag' => false]])->textInput(['style' => "display: none", 'value' => Lead::FEEDBACK_CONTACT_FORM_SUBJECT]); ?>
      <?= $form->field($lead, 'body', ['template' => '{input}', 'options' => ['tag' => false]])->textInput(['style' => "display: none", 'value' => Lead::FEEDBACK_CONTACT_FORM_SUBJECT, 'class' => '']); ?>
      <?= Html::submitButton(Yii::t('app', 'Submit Form'), ['class' => 'button button--dark']); ?>
      <div>        
        <?= Yii::t('app', 'If your submit form you agree'); ?>
        <a class="link" href="<?= Url::toRoute('/policy'); ?>" target="_blank">
          <?= Yii::t('app', 'Agreement text'); ?>
        </a>
      </div>

    <?php ActiveForm::end(); ?>

  </section>
</div>