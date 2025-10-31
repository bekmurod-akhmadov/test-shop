<?php
$this->title = $model->name;
?>
<!-- Page Wrapper End -->
        <div class="page-wrapper">
            <div class="body_overlay"></div>
            
            <!-- Content Wrapper Start -->
            <div class="content-wrapper">

                <!-- Breadcrumb Start -->
                <div class="breadcrumb-wrap bg-f br-1">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-7 col-sm-8">
                            <div class="breadcrumb-title">
                                <h2><?=$model->name     ?></h2>
                                <ul class="breadcrumb-menu list-style">
                                    <li><a href="<?=yii\helpers\Url::home() ?>">Asosiy </a></li>
                                    <li><a href="<?=yii\helpers\Url::to(['product/category', 'id' => $model->category_id]) ?>"><?=$model->category->name     ?></a></li>
                                    <li><?=$model->name  ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-4">
                            <div class="breadcrumb-img">
                                <img src="/img/breadcrumb/breadcrumb-img-3.png" alt="Image">
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <!-- Breadcrumb End -->

                <!-- Product Details section start -->
                <section class="product-details-wrap pt-100 mb-5">
                    <div class="container">
                        <div class="row gx-5">
                            <div class="col-lg-6">
                                <div class="single-product-gallery">
                                    <div class="swiper-container single-product_slider">
                                        <div class="swiper-wrapper">
                                            <?php if(!empty($model->productImages)): ?>
                                                <?php foreach($model->productImages as $productImage): ?>
                                                    <div class="swiper-slide single-product-item">
                                                        <img src="<?=Yii::$app->params['frontend'] . Yii::$app->params['uploads_url']  ?>/product/<?=$productImage->product_id?>/m_<?=$productImage->image?>" img="Image"/>
                                                    </div>
                                                <?php endforeach; ?>
                                            <?php endif ?>
                                        </div>
                                        <div class="swiper-button-next"> <i class="flaticon-right-arrow"></i></div>
                                        <div class="swiper-button-prev"><i class="flaticon-left-arrow"></i></div>
                                    </div>
                                    <div thumbsSlider="" class="swiper-container single-product_thumbs">
                                        <div class="swiper-wrapper">
                                            <?php if(!empty($model->productImages)): ?>
                                                <?php foreach($model->productImages as $productImage): ?>
                                                    <div class="swiper-slide single-product-thumb bg-albastor">
                                                        <img src="<?=Yii::$app->params['frontend'] . Yii::$app->params['uploads_url']  ?>/product/<?=$productImage->product_id?>/m_<?=$productImage->image?>" img="Image"/>
                                                    </div>
                                                <?php endforeach; ?>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="single-product-details">
                                    <div class="single-product-title">
                                        <h2><?=$model->name?></h2>
                                        <div class="single-product-price">
                                            <?php if($model->discount_price > 0): ?>
                                                <p><span class="discount"><?=number_format($model->price , '0', ' ', ' ')?> so'm</span><?=number_format($model->discount_price , '0', ' ', ' ')?> so'm</p>
                                            <?php else: ?>
                                                <p><?=number_format($model->price , '0', ' ', ' ')?> so'm</p>
                                            <?php endif ?>
                                            <div class="ratings">
                                                <?php if ($model->in_stock) : ?>
                                                <span class="badge bg bg-success promo-text text-light style1">Sotuvda mavjud</span>
                                                <?php else : ?>
                                                <span class="badge bg bg-danger promo-text text-light style1">Sotuvda mavjud emas</span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="single-product-desc">
                                        <?=$model->description?>
                                    </p>
                                    <div class="product-more-option">
                                        <div class="product-more-option-item">
                                            <h5>Status :</h5>
                                            <span><?=$model->status ? 'Aktiv' : 'Aktiv emas'?></span>
                                        </div>
                                        <div class="product-more-option-item">
                                            <div class="product-quantity">
                                                <div class="qtySelector">
                                                    <input type="text" id="qty" class="qtyValue" value="1" />
                                                    <span class="increaseQty">
                                                        <i class="ri-add-line"></i>
                                                    </span>
                                                    <span class="decreaseQty">
                                                        <i class="ri-subtract-line"></i>
                                                    </span>
                                                </div>
                                                <a href="<?=yii\helpers\Url::to(['cart/add', 'id' => $model->id])?>" data-id="<?= $model->id ?>" class="btn style1 add-to-cart">Savatga qo'shish <i class="flaticon-shopping-cart"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-more-option-item">
                                            <h5>Kategoriyasi :</h5>
                                            <a href="shop-left-sidebar.html"><?=$model->category->name?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row pt-100">
                            <div class="col-xl-10 offset-xl-1">
                                <ul class="nav nav-tabs single-product-tablist" role="tablist">
                                    <li class="nav-item">
                                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab_1"
                                            type="button" role="tab">Mahsulot haqida</button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="nav-link " data-bs-toggle="tab" data-bs-target="#tab_2" type="button"
                                            role="tab">Qo'shimcha ma'lumot</button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="nav-link " data-bs-toggle="tab" data-bs-target="#tab_3" type="button"
                                            role="tab">Izohlar</button>
                                    </li>
                                </ul>
                                <div class="tab-content single-product-tabcontent">
                                    <div class="tab-pane fade show active" id="tab_1" role="tabpanel">
                                        <div class="product_desc">
                                           <?=$model->body?>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab_2" role="tabpanel">
                                        <table class="product_metainfo">
                                            <tbody>
                                                <?php if(!empty($model->productChars)) : ?>
                                                    <?php foreach ($model->productChars as $productChar) : ?>
                                                        <tr>
                                                            <td><?=$productChar->name?>:</td>
                                                            <td><?=$productChar->value?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="tab_3" role="tabpanel">
                                        <div class="client-review comment-item-wrap">
                                            <div class="comment-item">
                                                <div class="comment-author-img">
                                                    <i style="font-size: 50px;" class="fas fa-user"></i>
                                                </div>
                                                <div class="comment-author-wrap">
                                                    <div class="comment-author-info">
                                                        <div class="row align-items-start">
                                                            <div class="comment-author-name">
                                                                <h5>Eliie Andrews</h5>
                                                                <span>06 Dec, 2021</span>
                                                                <ul class="list-style rating">
                                                                    <li><i class="ri-star-fill"></i></li>
                                                                    <li><i class="ri-star-fill"></i></li>
                                                                    <li><i class="ri-star-fill"></i></li>
                                                                    <li><i class="ri-star-fill"></i></li>
                                                                    <li><i class="ri-star-fill"></i></li>
                                                                </ul>
                                                            </div>
                                                            <div class="comment-text">
                                                                <p>Lorem ipsum dolor sit amet sectetur adipiscin elit cras feuiat antesed ces condimentum viverra duis autue nim convallis id diam vitae duis edictumojp erosi dictum sem. Vivamus sed molestie sapien aliquam et facilisis arcu dut.
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="client-review-form">
                                            <div class="comment-form-title">
                                                <h4>Add A Review</h4>
                                            </div>
                                            <form action="#" class="comment-form">
                                                <div class="row gx-3">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <textarea name="review-msg" id="review-msg" cols="30" rows="10" placeholder="Your comments..."></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group s1">
                                                            <input type="text" placeholder="Your  Full Name*">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group s2">
                                                            <input type="email" placeholder="Email Address*">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="checkbox">
                                                            <input type="checkbox" id="test_1">
                                                            <label for="test_1">
                                                                I Agree with the <a class="link style1" href="terms-of-service.html">Terms &amp; conditions</a>
                                                            </label>
                                                        </div>
                                                        <button class="btn style1 mt-25">Submit Review </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>  
                <!-- Product Details section end -->

                <?php if(!empty($relatedProducts)) : ?>
                    <!-- Deals Section Start -->
                    <section class="related-product pt-100 ">
                        <div class="container">
                            <div class="section-title style2 text-center mb-40">
                                <h2>Tavsiya qilingan mahsulotlar</h2>
                            </div>
                            <div class="product-slider-one owl-carousel">
                                <?php foreach($relatedProducts as $product): ?>
                                   <div class="product-card style2">
                                        <ul class="product-option list-style">
                                            <li><a href="<?=yii\helpers\Url::to(['product/view', 'id' => $product->id])?>"><i class="fas fa-eye"></i></a></li>
                                        </ul>
                                        <div class="product-img">
                                            <img src="<?= $product->getImageFile() ?>" alt="image">
                                            <?php if ($product->discount_price) : ?>
                                                <span class="bg bg-danger promo-text style1">Sale</span>
                                            <?php endif; ?>
                                            <button class="add-to-wishlist"><i class="flaticon-heart-1"></i><i class="flaticon-heart"></i></button>
                                        </div>
                                        <div class="product-info-wrap">
                                            <div class="product-info">
                                                <h3><a href="shop-details.html"><?= $product->name ?></a></h3>
                                                <div class="ratings">
                                                    <?php if ($product->in_stock) : ?>
                                                    <span class="badge bg bg-success promo-text text-light style1">Sotuvda mavjud</span>
                                                    <?php else : ?>
                                                    <span class="badge bg bg-danger promo-text text-light style1">Sotuvda mavjud emas</span>
                                                    <?php endif; ?>
                                                </div>
                                                <?php if ($product->discount_price) : ?>
                                                    <p class="product-price"><span class="discount"><?= number_format($product->price , '0', ' ', ' ') ?> so'm</span><?= number_format($product->discount_price , '0', ' ', ' ') ?> so'm</p>
                                                <?php else : ?>
                                                    <p class="product-price"><?= number_format($product->price , '0', ' ', ' ') ?> so'm</p>
                                                <?php endif; ?>
                                            </div>
                                            <a class="add-to-cart" href="<?=yii\helpers\Url::to(['cart/add', 'id' => $product->id])?>" data-id="<?= $product->id ?>">
                                                <i class="ri-shopping-cart-2-line"></i>
                                            </a>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </section>
                    <!-- Deals Section End -->
                <?php endif; ?>

                <?php if(!empty($additionalProducts)) : ?>
                    <!-- Deals Section Start -->
                    <section class="related-product pt-100 ">
                        <div class="container">
                            <div class="section-title style2 text-center mb-40">
                                <h2>Qo'shimcha mahsulotlar</h2>
                            </div>
                            <div class="product-slider-one owl-carousel">
                                <?php foreach($additionalProducts as $additionalProduct): ?>
                                   <div class="product-card style2">
                                        <ul class="product-option list-style">
                                            <li><a href="<?=yii\helpers\Url::to(['product/view', 'id' => $additionalProduct->id])?>"><i class="fas fa-eye"></i></a></li>
                                        </ul>
                                        <div class="product-img">
                                            <img src="<?= $additionalProduct->getImageFile() ?>" alt="image">
                                            <?php if ($additionalProduct->discount_price) : ?>
                                                <span class="bg bg-danger promo-text style1">Sale</span>
                                            <?php endif; ?>
                                            <button class="add-to-wishlist"><i class="flaticon-heart-1"></i><i class="flaticon-heart"></i></button>
                                        </div>
                                        <div class="product-info-wrap">
                                            <div class="product-info">
                                                <h3><a href="shop-details.html"><?= $additionalProduct->name ?></a></h3>
                                                <div class="ratings">
                                                    <?php if ($additionalProduct->in_stock) : ?>
                                                    <span class="badge bg bg-success promo-text text-light style1">Sotuvda mavjud</span>
                                                    <?php else : ?>
                                                    <span class="badge bg bg-danger promo-text text-light style1">Sotuvda mavjud emas</span>
                                                    <?php endif; ?>
                                                </div>
                                                <?php if ($additionalProduct->discount_price) : ?>
                                                    <p class="product-price"><span class="discount"><?= number_format($additionalProduct->price , '0', ' ', ' ') ?> so'm</span><?= number_format($additionalProduct->discount_price , '0', ' ', ' ') ?> so'm</p>
                                                <?php else : ?>
                                                    <p class="product-price"><?= number_format($additionalProduct->price , '0', ' ', ' ') ?> so'm</p>
                                                <?php endif; ?>
                                            </div>
                                            <a class="add-to-cart" href="<?=yii\helpers\Url::to(['cart/add', 'id' => $additionalProduct->id])?>" data-id="<?= $additionalProduct->id ?>">
                                                <i class="ri-shopping-cart-2-line"></i>
                                            </a>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </section>
                    <!-- Deals Section End -->
                <?php endif; ?>

                <?php if(!empty($recentProducts)) : ?>
                    <!-- Deals Section Start -->
                    <section class="related-product pt-100">
                        <div class="container">
                            <div class="section-title style2 text-center mb-40">
                                <h2>Yaqinda ko'rilganlar</h2>
                            </div>
                            <div class="product-slider-one owl-carousel">
                                <?php foreach($recentProducts as $recentProduct): ?>
                                   <div class="product-card style2">
                                        <ul class="product-option list-style">
                                            <li><a href="<?=yii\helpers\Url::to(['product/view', 'id' => $recentProduct->id])?>"><i class="fas fa-eye"></i></a></li>
                                        </ul>
                                        <div class="product-img">
                                            <img src="<?= $recentProduct->getImageFile() ?>" alt="image">
                                            <?php if ($recentProduct->discount_price) : ?>
                                                <span class="bg bg-danger promo-text style1">Sale</span>
                                            <?php endif; ?>
                                            <button class="add-to-wishlist"><i class="flaticon-heart-1"></i><i class="flaticon-heart"></i></button>
                                        </div>
                                        <div class="product-info-wrap">
                                            <div class="product-info">
                                                <h3><a href="shop-details.html"><?= $recentProduct->name ?></a></h3>
                                                <div class="ratings">
                                                    <?php if ($recentProduct->in_stock) : ?>
                                                    <span class="badge bg bg-success promo-text text-light style1">Sotuvda mavjud</span>
                                                    <?php else : ?>
                                                    <span class="badge bg bg-danger promo-text text-light style1">Sotuvda mavjud emas</span>
                                                    <?php endif; ?>
                                                </div>
                                                <?php if ($recentProduct->discount_price) : ?>
                                                    <p class="product-price"><span class="discount"><?= number_format($recentProduct->price , '0', ' ', ' ') ?> so'm</span><?= number_format($recentProduct->discount_price , '0', ' ', ' ') ?> so'm</p>
                                                <?php else : ?>
                                                    <p class="product-price"><?= number_format($recentProduct->price , '0', ' ', ' ') ?> so'm</p>
                                                <?php endif; ?>
                                            </div>
                                            <a class="add-to-cart" data-id="<?= $recentProduct->id ?>" href="<?=yii\helpers\Url::to(['cart/add', 'id' => $recentProduct->id])?>">
                                                <i class="ri-shopping-cart-2-line"></i>
                                            </a>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </section>
                    <!-- Deals Section End -->
                <?php endif; ?>

            </div>
            <!-- Content Wrapper End -->
        </div>
        <!-- Page Wrapper End -->