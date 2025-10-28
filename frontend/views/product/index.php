<!-- Content Wrapper Start -->
            <div class="content-wrapper">

                <!-- Breadcrumb Start -->
                <div class="breadcrumb-wrap bg-f br-1">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-7 col-sm-8">
                            <div class="breadcrumb-title">
                                <h2>Shop 3 Column</h2>
                                <ul class="breadcrumb-menu list-style">
                                    <li><a href="<?=yii\helpers\Url::to(['site/index'])?>">Asosiy </a></li>
                                    <li>Mahsulotlar</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-4">
                            <div class="breadcrumb-img">
                                <img src="/img/breadcrumb/breadcrumb-img-5.png" alt="Image">
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <!-- Breadcrumb End -->

                <!-- Shop section start -->
                <div class="shop-wrap ptb-100">
                    <div class="container">
                        <div class="row">
                            <div class="row justify-content-center">
                                <?php if (!empty($models)) : ?>
                                    <?php foreach ($models as $model) : ?>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                            <div class="product-card style2">
                                                <ul class="product-option list-style">
                                                    <li><a href="<?=yii\helpers\Url::to(['product/view', 'id' => $model->id])?>"><i class="fas fa-arrow-right"></i></a></li>
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
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                                
                            </div>

                            <div class="page-navigation mt-10 d-flex justify-content-center">
                                <?=yii\bootstrap5\LinkPager::widget([
                                    'pagination' => $pagination,
                                ])?>
                                <!-- <ul class="page-nav list-style">
                                    <li><a href="shop-right-sidebar.html"><i class="flaticon-left-arrow"></i></a></li>
                                    <li><a class="active" href="shop-right-sidebar.html">1</a></li>
                                    <li><a href="shop-right-sidebar.html">2</a></li>
                                    <li><a href="shop-right-sidebar.html">3</a></li>
                                    <li><a href="shop-right-sidebar.html"><i class="flaticon-right-arrow"></i></a></li>
                                </ul> -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Shop section end -->

            </div>
            <!-- Content Wrapper End -->