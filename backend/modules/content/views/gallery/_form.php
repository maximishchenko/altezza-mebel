<?php

use backend\modules\content\models\Gallery;
use backend\modules\content\models\GalleryImage;
use backend\widgets\SingleImagePreviewWidget;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\modules\content\models\Gallery $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="gallery-form">

<?php $form = ActiveForm::begin([
        'id' => 'gallery-form',
    ]); ?>

    <?= $form->errorSummary($model, ['class' => 'alert alert-danger']); ?>    <div class="accordion" id="backendAccordion">
        
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
                            <?= $form->field($model, 'status')->checkbox() ?>

                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'sort')->textInput() ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>

<div class="accordion-item">
    <h2 class="accordion-header" id="headImages">
        <button class="accordion-button collapsed" type="button" data-toggle="collapse" data-target="#imagesBlock" aria-expanded="false" aria-controls="imagesBlock">
            <strong>
                <?= Yii::t('app', 'Upload Images'); ?>
            </strong>
        </button>
    </h2>
    <div id="imagesBlock" class="accordion-collapse collapse" aria-labelledby="headImages" data-bs-parent="#backendAccordion">
        <div class="accordion-body">

            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'imageFile', ['template' => '{label}<br/> {input} {error}'])->fileInput() ?>
                    <?php if(isset($model->image) && !empty($model->image)): ?>
                        <div class="row">
                            <?= SingleImagePreviewWidget::widget([
                                'id' => $model->id,
                                'filePath' => $model->getUrl(Gallery::UPLOAD_PATH, $model->image),
                                'url' => 'delete-image',
                                'fancyboxGalleryName' => "SingleCategoryImage",
                            ]); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'imagesFiles[]', ['template' => '{label}<br/> {input} {error}'])->fileInput(['multiple' => true]) ?>
                    <?php if(isset($model->images) && !empty($model->images)):?>
                    <ul style="margin: 0; padding: 0;">
                        <div id="sortable" class="row" data-url="<?= Yii::$app->urlManager->createAbsoluteUrl('/content/gallery/save-image-sort'); ?>">
                            <?php foreach ($model->images as $k => $img): ?>
                                <?php 
                                echo SingleImagePreviewWidget::widget([
                                    'id' => $img->id,
                                    'filePath' => $img->getUrl(Gallery::UPLOAD_PATH, $img->image),
                                    'url' => 'delete-images',
                                    'fancyboxGalleryName' => "SingleProductImage",
                                ]); 
                                ?>
                            <?php endforeach; ?>
                        </div>
                    </ul>
                    <?php endif; ?>
                </div>
            </div>
        
        </div>
    </div>
</div>

    </div>       


    <?php ActiveForm::end(); ?>

</div>

<?php $this->registerJsFile("@web/js/sortable.js"); ?>
<?= $this->render('//layouts/forms/_buttons', ['formId' => 'gallery-form']); ?>