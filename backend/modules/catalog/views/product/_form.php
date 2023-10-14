<?php

use backend\modules\catalog\models\Product;
use backend\modules\catalog\models\ProductImage;
use backend\modules\catalog\models\PropertyAppliance;
use backend\modules\catalog\models\PropertyForm;
use backend\modules\catalog\models\PropertyStyle;
use backend\modules\catalog\models\PropertyType;
use backend\widgets\SingleImagePreviewWidget;
use yii\bootstrap5\ActiveForm;

?>

<div class="product-form">

    <?php $form = ActiveForm::begin([
        'id' => 'product-form',
    ]); ?>
    <?= $form->errorSummary($model, ['class' => 'alert alert-danger']); ?>

    <?php if (!$model->isNewRecord) {
            echo $this->render('_tabs_update', ['model' => $model]); 
        } ?>

    <div class="accordion" id="backendAccordion">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headPrimary">
                <button class="accordion-button" type="button" data-toggle="collapse" data-target="#primary" aria-expanded="true" aria-controls="primary">
                    <strong>
                        <?= Yii::t('app', 'Primary block'); ?>
                    </strong>
                </button>
            </h2>
            <div id="primary" class="accordion-collapse collapse show" aria-labelledby="headPrimary" data-bs-parent="#backendAccordion">
                <div class="accordion-body">

                    <div class="row">
                        <div class="col-md-6">

                            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                            <?= $form->field($model, 'type_id')->dropDownList(PropertyType::getList(), ['prompt' => Yii::t('app', 'Choose from list')]); ?>
                            <?= $form->field($model, 'style_id')->dropDownList(PropertyStyle::getList(), ['prompt' => Yii::t('app', 'Choose from list')]); ?>
                            <?= $form->field($model, 'form_id')->dropDownList(PropertyForm::getList(), ['prompt' => Yii::t('app', 'Choose from list')]); ?>
                            <?= $form->field($model, 'appliance_id')->dropDownList(PropertyAppliance::getList(), ['prompt' => Yii::t('app', 'Choose from list')]); ?>
                            <?= $form->field($model, 'sort')->textInput() ?>
                            <?= $form->field($model, 'slug')->textInput()->hint($model->getAttributeHint('slug')) ?>
                            <?= $form->field($model, 'view_count')->textInput(['type' => 'number'])->hint($model->getAttributeHint('view_count')) ?>
                            <?= $form->field($model, 'is_new')->checkbox() ?>
                            <?= $form->field($model, 'status')->checkbox() ?>

                        </div>
                        <div class="col-md-6">

                            <?= $form->field($model, 'description')->textarea(['rows' => 12])->hint($model->getAttributeHint('description')) ?>
                            <?= $form->field($model, 'comment')->textarea(['rows' => 12])->hint($model->getAttributeHint('comment')) ?>

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
                                        'filePath' => $model->getUrl(Product::UPLOAD_PATH, $model->image),
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
                                <div id="sortable" class="row" data-url="<?= Yii::$app->urlManager->createAbsoluteUrl('/catalog/product/save-image-sort'); ?>">
                                    <?php foreach ($model->images as $k => $img): ?>
                                        <?php 
                                        echo SingleImagePreviewWidget::widget([
                                            'id' => $img->id,
                                            'filePath' => $img->getUrl(ProductImage::UPLOAD_PATH, $img->image),
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


        <div class="accordion-item">
            <h2 class="accordion-header" id="headProductFasadMaterial">
                <button class="accordion-button collapsed" type="button" data-toggle="collapse" data-target="#productFasadMaterial" aria-expanded="false" aria-controls="productFasadMaterial">
                    <strong>
                        <?= $model->getAttributeLabel('fasadMaterialsArray'); ?>
                    </strong>
                </button>
            </h2>
            <div id="productFasadMaterial" class="accordion-collapse collapse" aria-labelledby="headProductFasadMaterial" data-bs-parent="#backendAccordion">
                <div class="accordion-body">

                    <div class="row">
                        <div class="col-md-12">
                            <?= $form->field($model, 'fasadMaterialsArray')->checkboxList($model->getFasadMaterialsCheckboxListItems(), ['class' => 'checkbox__group'])->label(false)  ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="headProductFasadCoating">
                <button class="accordion-button collapsed" type="button" data-toggle="collapse" data-target="#productFasadCoating" aria-expanded="false" aria-controls="productFasadCoating">
                    <strong>
                        <?= $model->getAttributeLabel('fasadCoatingsArray'); ?>
                    </strong>
                </button>
            </h2>
            <div id="productFasadCoating" class="accordion-collapse collapse" aria-labelledby="headProductFasadCoating" data-bs-parent="#backendAccordion">
                <div class="accordion-body">

                    <div class="row">
                        <div class="col-md-12">
                            <?= $form->field($model, 'fasadCoatingsArray')->checkboxList($model->getFasadCoatingsCheckboxListItems(), ['class' => 'checkbox__group'])->label(false)  ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="headProductDecorativeElements">
                <button class="accordion-button collapsed" type="button" data-toggle="collapse" data-target="#productDecorativeElements" aria-expanded="false" aria-controls="productDecorativeElements">
                    <strong>
                        <?= $model->getAttributeLabel('decorativeElementsArray'); ?>
                    </strong>
                </button>
            </h2>
            <div id="productDecorativeElements" class="accordion-collapse collapse" aria-labelledby="headProductDecorativeElements" data-bs-parent="#backendAccordion">
                <div class="accordion-body">

                    <div class="row">
                        <div class="col-md-12">
                            <?= $form->field($model, 'decorativeElementsArray')->checkboxList($model->getDecorativeElementsCheckboxListItems(), ['class' => 'checkbox__group'])->label(false)  ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="headProductBodyMaterial">
                <button class="accordion-button collapsed" type="button" data-toggle="collapse" data-target="#productBodyMaterial" aria-expanded="false" aria-controls="productBodyMaterial">
                    <strong>
                        <?= $model->getAttributeLabel('bodyMaterialsArray'); ?>
                    </strong>
                </button>
            </h2>
            <div id="productBodyMaterial" class="accordion-collapse collapse" aria-labelledby="headProductBodyMaterial" data-bs-parent="#backendAccordion">
                <div class="accordion-body">

                    <div class="row">
                        <div class="col-md-12">
                            <?= $form->field($model, 'bodyMaterialsArray')->checkboxList($model->getBodyMaterialsCheckboxListItems(), ['class' => 'checkbox__group'])->label(false)  ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="headProductFurniture">
                <button class="accordion-button collapsed" type="button" data-toggle="collapse" data-target="#productFurniture" aria-expanded="false" aria-controls="productFurniture">
                    <strong>
                        <?= $model->getAttributeLabel('furnituresArray'); ?>
                    </strong>
                </button>
            </h2>
            <div id="productFurniture" class="accordion-collapse collapse" aria-labelledby="headProductFurniture" data-bs-parent="#backendAccordion">
                <div class="accordion-body">

                    <div class="row">
                        <div class="col-md-12">
                            <?= $form->field($model, 'furnituresArray')->checkboxList($model->getFurnituresCheckboxListItems(), ['class' => 'checkbox__group'])->label(false)  ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="headProductBacklight">
                <button class="accordion-button collapsed" type="button" data-toggle="collapse" data-target="#productBacklight" aria-expanded="false" aria-controls="productBacklight">
                    <strong>
                        <?= $model->getAttributeLabel('backlightsArray'); ?>
                    </strong>
                </button>
            </h2>
            <div id="productBacklight" class="accordion-collapse collapse" aria-labelledby="headProductBacklight" data-bs-parent="#backendAccordion">
                <div class="accordion-body">

                    <div class="row">
                        <div class="col-md-12">
                            <?= $form->field($model, 'backlightsArray')->checkboxList($model->getBacklightsCheckboxListItems(), ['class' => 'checkbox__group'])->label(false)  ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="headProductTableTop">
                <button class="accordion-button collapsed" type="button" data-toggle="collapse" data-target="#productTableTop" aria-expanded="false" aria-controls="productTableTop">
                    <strong>
                        <?= $model->getAttributeLabel('tableTopsArray'); ?>
                    </strong>
                </button>
            </h2>
            <div id="productTableTop" class="accordion-collapse collapse" aria-labelledby="headProductTableTop" data-bs-parent="#backendAccordion">
                <div class="accordion-body">

                    <div class="row">
                        <div class="col-md-12">
                            <?= $form->field($model, 'tableTopsArray')->checkboxList($model->getTableTopsCheckboxListItems(), ['class' => 'checkbox__group'])->label(false)  ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php $this->registerJsFile("@web/js/sortable.js"); ?>
<?= $this->render('//layouts/forms/_buttons', ['formId' => 'product-form']); ?>
