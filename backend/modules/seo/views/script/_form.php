<?php

use backend\modules\seo\models\Script;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\seo\models\Script */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="script-form">
    <div class="container">

    <?php $form = ActiveForm::begin([
        'id' => 'script-form',
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

                        <?= $form->field($model, 'status')->checkbox() ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'position')->dropDownList(Script::getScriptPositionsArray(), []) ?>
                        <?= $form->field($model, 'code')->textarea(['rows' => 6]) ?>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>   

    <?php ActiveForm::end(); ?>

</div>

</div>
<?= $this->render('//layouts/forms/_buttons', ['formId' => 'script-form']); ?>