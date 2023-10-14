<?php

use frontend\modules\content\models\Lead;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>


<div class="graph-modal">

    <div class="graph-modal__container request-modal-container" role="dialog" aria-modal="true" data-graph-target="send-request">
        <!-- <button class="btn-reset graph-modal__close js-modal-close" aria-label="Закрыть модальное окно"></button> -->
        <?= Html::button('', ['class' => 'btn-reset graph-modal__close js-modal-close', 'aria-label' => Yii::t('app', 'Close modal')])?>
        <div class="graph-modal__content">
            <!-- контент модального окна -->
            <section class="request">
                <h2 class="request__title">
                    <?= Yii::t('app', 'Please submit form for callback'); ?>
                </h2>
                <!-- <form class="request__form" action="" method="post"> -->
                    
                <?php 
                $form = ActiveForm::begin([
                    'id' => 'calback-form-modal',
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
                <!-- <input class="request__form__imput" placeholder="Ф.И.О." type="text" name="request__name" id="request-name">
                <input class="request__form__imput" placeholder="Телефон" type="text" name="request__phone" id="request-phone"> -->
                
                <?= $form->field($lead, 'name', ['template' => '{input}'])->textInput(['placeholder' => $lead->getAttributeLabel('name'), 'class' => 'request__form__imput', 'required' => '']); ?>
                <?= $form->field($lead, 'phone', ['template' => '{input}'])->textInput(['placeholder' => $lead->getAttributeLabel('phone'), 'class' => 'request__form__imput', 'data-tel-input' => '', 'required' => '']); ?>
                
                <?= $form->field($lead, 'subject', ['template' => '{input}', 'options' => ['tag' => false]])->textInput(['style' => "display: none", 'value' => Lead::FEEDBACK_CONTACT_FORM_SUBJECT]); ?>
                <?= $form->field($lead, 'body', ['template' => '{input}', 'options' => ['tag' => false]])->textInput(['style' => "display: none", 'value' => Lead::FEEDBACK_CONTACT_FORM_SUBJECT, 'class' => '']); ?>
      
                <?= Html::submitButton(Yii::t('app', 'Submit Form'), ['class' => 'button button--dark'])?>
                <div>
                    <?= Yii::t('app', 'If your submit form you agree'); ?>
                    <?= Html::a(Yii::t('app', 'Agreement text'), ['/policy'], ['target' => '_blank', 'class' => 'link']); ?>
                </div>
                <!-- </form> -->
                <?php ActiveForm::end(); ?>
            </section>
        </div>
    </div>


    <div class="graph-modal__container request-modal-container" role="dialog" aria-modal="true" data-graph-target="answer-request">
        <!-- <button class="btn-reset graph-modal__close js-modal-close" aria-label="Закрыть модальное окно"></button> -->
        <?= Html::button('', ['class' => 'btn-reset graph-modal__close js-modal-close', 'aria-label' => Yii::t('app', 'Close modal')])?>
        <div class="graph-modal__content">
            <!-- контент модального окна -->
            <div class="answer-request">

                <svg role="image" class="success">
                    <use xlink:href="/static/sprite.svg#success" />
                </svg>
                <?= Yii::t('app', 'Thanks for callback'); ?>
            </div>
        </div>
    </div>


</div>