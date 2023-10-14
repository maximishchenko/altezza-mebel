<?php

use backend\modules\seo\models\Redirect;
use yii\bootstrap5\ActiveForm;

?>

<div class="redirect-form">

<div class="container">


    <?php $form = ActiveForm::begin([
        'id' => 'redirect-form'
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
                            <?= $form->field($model, 'source_url')->textInput(['maxlength' => true]) ?>
                            <?= $form->field($model, 'destination_url')->textInput(['maxlength' => true]) ?>
                            <?= $form->field($model, 'redirect_code')->dropDownList(Redirect::getRedirectCodeArray(), []) ?>
                            <?= $form->field($model, 'sort')->textInput() ?>
                            <?= $form->field($model, 'status')->checkbox() ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'comment')->textarea(['rows' => 12]) ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>       
    
    <?php ActiveForm::end(); ?>
    
</div>

</div>
<?= $this->render('//layouts/forms/_buttons', ['formId' => 'redirect-form']); ?>
