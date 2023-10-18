<?php

use backend\modules\management\models\User;
use yii\bootstrap5\ActiveForm;

?>

<div class="user-form">

    <?php $form = ActiveForm::begin([
        'id' => 'users-form',
    ]); ?>

    <?= $form->errorSummary($model, ['class' => 'alert alert-danger']); ?>

    <?php
    foreach($model->getErrors() as $error) {
        print_r($error);
    }
    ?>

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
                            <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
                            <?= $form->field($model, 'newPassword')->passwordInput() ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>
                            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                            <?= $form->field($model, 'repeatPassword')->passwordInput() ?>
                            <?= $form->field($model, 'status')->dropDownList(User::getStatusesArray(), ['class' => 'form-control']) ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>       
    
    <?php ActiveForm::end(); ?>

</div>

<?= $this->render('//layouts/forms/_buttons', ['formId' => 'users-form']); ?>