<!-- Deals Section Start -->
<section class="deals-wrap bg-sand pt-100 pb-75">
    <div class="container">
        <div class="row align-items-end mb-40">
            <div class="col-lg-6">
                <div class="content-title">
                    <h2>Eng so'nggi mahsulotlar</h2>
                </div>
            </div>
        </div>
        <div class="product-slider-one owl-carousel">
            <?php if (!empty($models)) : ?>
            <?php foreach ($models as $model) : ?>
            
                <div class="product-card style1">
                    <ul class="product-option list-style">
                        <li><a href="<?=yii\helpers\Url::to(['product/view', 'id' => $model->id])?>"><i class="fas fa-eye"></i></a></li>
                    </ul>
                    <div class="product-img">
                        <img src="<?= $model->getImageFile() ?>" alt="image">
                        <?php if ($model->discount_price) : ?>
                        <span class="bg bg-danger promo-text style1">Sale</span>
                        <?php endif; ?>
                        <button class="add-to-wishlist"><i class="flaticon-heart-1"></i><i class="flaticon-heart"></i></button>
                    </div>
                    <div class="product-info-wrap">
                        <div class="product-info">
                            <h3><a href="<?=yii\helpers\Url::to(['product/view', 'id' => $model->id])?>"><?= $model->name ?></a></h3>
                            <div class="ratings">
                                <?php if ($model->in_stock) : ?>
                                <span class="badge bg bg-success promo-text text-light style1">Sotuvda mavjud</span>
                                <?php else : ?>
                                <span class="badge bg bg-danger promo-text text-light style1">Sotuvda mavjud emas</span>
                                <?php endif; ?>
                            </div>
                            <?php if ($model->discount_price) : ?>
                                <p class="product-price"><span class="discount"><?= number_format($model->price , '0', ' ', ' ') ?> so'm</span><?= number_format($model->discount_price , '0', ' ', ' ') ?> so'm</p>
                            <?php else : ?>
                                <p class="product-price"><?= number_format($model->price , '0', ' ', ' ') ?> so'm</p>
                            <?php endif; ?>
                        </div>
                        <a class="add-to-cart" href="<?=yii\helpers\Url::to(['cart/add', 'id' => $model->id])?>">
                            <i class="ri-shopping-cart-2-line"></i>
                        </a>
                    </div>
                </div>
                
            <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- Deals Section End -->