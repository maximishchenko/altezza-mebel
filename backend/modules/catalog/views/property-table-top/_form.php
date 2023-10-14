<?php

use yii\bootstrap5\ActiveForm;
?>

<div class="property-table-top-form">

<?php $form = ActiveForm::begin([
        'id' => 'property-table-top-form',
    ]); ?>

    <?= $form->errorSummary($model, ['class' => 'alert alert-danger']); ?>


    <div class="accordion" id="backendAccordion">
        
        <div class="accordion-item">
            <h2 class="accordion-header" id="headerPrimary">
                <button class="accordion-button" type="button" data-toggle="collapse" data-target="#collapsePrimary" aria-expanded="true" aria-controls="collapsePrimary">
                    <strong>
                        <?= Yii::t('app', 'Primary block'); ?>
                    </strong>
                </button>
            </h2>
            <div id="collapsePrimary" class="accordion-collapse collapse show" aria-labelledby="headerPrimary" data-parent="#backendAccordion">
                <div class="accordion-body">
                
                    <div class="row">
                        <div class="col-md-6">
                            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                            <?= $form->field($model, 'sort')->textInput() ?>
                            <?= $form->field($model, 'slug')->textInput() ?>
                            <?= $form->field($model, 'status')->checkbox() ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'comment')->textarea(['rows' => 10]) ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>   
    
    <?php ActiveForm::end(); ?>
</div>

<?= $this->render('//layouts/forms/_buttons', ['formId' => 'property-table-top-form']); ?>