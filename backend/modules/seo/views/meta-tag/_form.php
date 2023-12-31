<?php

use yii\bootstrap4\ActiveForm;
?>

<div class="meta-tag-form">

<div class="container">

    <?php $form = ActiveForm::begin([
        'id' => 'meta-tag-form'
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
                <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'h1_text')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'status')->checkbox() ?>
                <?= $form->field($model, 'meta_title')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'meta_keywords')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'meta_description')->textarea(['rows' => 6]) ?>
                        </div>
                        <div class="col-md-6">
                <?= $form->field($model, 'description_text')->textarea(['rows' => 6]) ?>
                <?= $form->field($model, 'sort')->textInput() ?>
                <?= $form->field($model, 'og_title')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'og_description')->textarea(['rows' => 6]) ?>
                <?= $form->field($model, 'og_image')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'og_url')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'og_sitename')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'og_type')->textInput(['maxlength' => true]) ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>       
    <?php ActiveForm::end(); ?>

</div>

</div>
<?= $this->render('//layouts/forms/_buttons', ['formId' => 'meta-tag-form']); ?>