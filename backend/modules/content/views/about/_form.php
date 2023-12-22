<?php

/** @var yii\web\View $this */
/** @var backend\modules\content\models\About $model */
/** @var yii\widgets\ActiveForm $form */

use backend\modules\content\models\About;
use backend\widgets\SingleImagePreviewWidget;
use yii\bootstrap5\ActiveForm;

?>

<div class="about-form">

    <?php $form = ActiveForm::begin([
        'id' => 'about-form',
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

                            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

                            <?= $form->field($model, 'link')->textInput(); ?>

                            <?= $form->field($model, 'sort')->textInput() ?>

                            <?= $form->field($model, 'status')->checkbox() ?>

                            <?= $form->field($model, 'imageFile', ['template' => '{label}<br/> {input} {error}'])->fileInput() ?>
                            <?php if(isset($model->image) && !empty($model->image)): ?>
                                <div class="row">
                                    <?= SingleImagePreviewWidget::widget([
                                        'id' => $model->id,
                                        'filePath' => $model->getUrl(About::UPLOAD_PATH, $model->image),
                                        'url' => 'delete-image',
                                        'fancyboxGalleryName' => "SingleCategoryImage",
                                    ]); ?>
                                </div>
                            <?php endif; ?>

                        </div>
                        <div class="col-md-6">

                            <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

                            <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>
                            
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>



    <?php ActiveForm::end(); ?>

</div>

<?= $this->render('//layouts/forms/_buttons', ['formId' => 'about-form']); ?>