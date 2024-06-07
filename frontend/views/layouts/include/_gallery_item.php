
<article class="gallery__list__item" style="background-image: url('<?= $model->thumb; ?>');" data-fancybox="gallery-card-<?= $model->id; ?>" data-src="<?= $model->thumb; ?>">
    <figcaption class="article__layer">
        <div class="article__name">
            <?= $model->name; ?>
        </div>
    </figcaption>
</article>      

<?php foreach($model->images as $image): ?>
    <span data-fancybox="gallery-card-<?= $model->id; ?>" data-src="<?= $image->thumb; ?>"></span>
<?php endforeach; ?>