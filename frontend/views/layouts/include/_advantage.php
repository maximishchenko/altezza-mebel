<?php
use yii\helpers\Html;
?>

    <style>
        .block {
            padding: 3rem;
        }
        .center {
            text-align: center;
        }
    </style>

<?php if(isset($advantages) && !empty($advantages)): ?>
    <section class="advantages">
        <div class="block center">
            <h2>
                <?= Yii::t('app', 'Our favorite advantages'); ?>
            </h2>
        </div>
        <div class="grid">
            <?php foreach($advantages as $advantage): ?>
                <figure class="effect-oscar">
                    <?= Html::img($advantage->thumb, ['alt' => $advantage->title]); ?>
                    <figcaption>
                        <h2>
                            <?= $advantage->title; ?>
                        </h2>
                        <?= Html::button($advantage->getCallbackButtonText(), ['class' => 'product-card__info__button button button--light js-send-request']); ?>
                        <p>
                            <?= $advantage->description; ?>
                        </p>
                    </figcaption>
                </figure>
            <?php endforeach; ?>
        </div>

        <div class="block center">
            &nbsp;
            
        </div>
    </section>
<?php endif; ?>