<!-- Category Section Start -->
<section class="category-wrap pt-100 pb-75">
    <div class="container">
        <div class="section-title style1 text-center mb-40">
            <span><i class="flaticon-star-fruit"></i>FEATURED CATEGORIES</span>
            <h2>Popular Categories</h2>
        </div>
        <div class="category-slider-one owl-carousel">
            <?php if (!empty($models)) : ?>
                <?php foreach ($models as $model) : ?>
                    <div class="category-card style1">
                        <img src="<?= $model->getImageFile() ?>" alt="Image" class="cat-img">
                        <h3><a href="<?=yii\helpers\Url::to(['product/category', 'id' => $model->id])?>"><?= $model->name ?></a></h3>
                        <a href="<?=yii\helpers\Url::to(['product/category', 'id' => $model->id])?>" class="link style1"><?= $model->getProductsCount() ?> dona <i class="flaticon-right-arrow"></i></a>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        
        </div>
    </div>
</section>
<!-- Category Section End -->
