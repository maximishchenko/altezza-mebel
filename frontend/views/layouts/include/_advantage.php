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
                        <p>
                            <?= $advantage->description; ?>
                        </p>
                    </figcaption>
                </figure>
            <?php endforeach; ?>
        </div>

        <div class="block center">
            <?= Yii::t('app', 'Need advantage question'); ?>
            <?= Html::button(Yii::t('app', 'Send Callback Request a call'), ['class' => 'product-card__info__button button button--dark js-send-request']); ?>
        </div>
    </section>
<?php endif; ?>