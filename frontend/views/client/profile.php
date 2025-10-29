<?php

$this->title = "Profil";
?>
<!-- Content Wrapper Start -->
<div class="content-wrapper">

    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap bg-f br-1">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-7 col-sm-8">
                    <div class="breadcrumb-title">
                        <h2>Shop Left Sidebar</h2>
                        <ul class="breadcrumb-menu list-style">
                            <li><a href="<?=yii\helpers\Url::home()?>">Asosiy </a></li>
                            <li>Profil</li>
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
                <div class="col-xxl-3 col-xl-4 col-lg-12 order-xl-1 order-lg-2 order-md-2 order-2">
                    <div class="sidebar">
                    
                        <div class="sidebar-widget categories style2">
                            <h4>Categories</h4>
                            <div class="category-box">
                                <ul class="list-style">
                                    <li>
                                        <a href="shop-category.html">
                                            <i class="flaticon-next"></i>
                                            Vegetables
                                        </a>
                                    </li>
                                    <li>
                                        <a href="shop-category.html">
                                            <i class="flaticon-next"></i>
                                            Meat & Poultry
                                        </a>
                                    </li>
                                    <li>
                                        <a href="shop-category.html">
                                            <i class="flaticon-next"></i>
                                            Fruits
                                        </a>
                                    </li>
                                    <li>
                                        <a href="shop-category.html">
                                            <i class="flaticon-next"></i>
                                            Fresh Drinks
                                        </a>
                                    </li>
                                    <li>
                                        <a href="shop-category.html">
                                            <i class="flaticon-next"></i>
                                            New Arrival
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                       
                    </div>
                </div>
                <div class="col-xxl-9 col-xl-8 col-lg-12 order-xl-2 order-lg-1 order-md-1 order-1">
                    <div class="row align-items-center mb-25">
                        <div class="col-xl-5 col-lg-5 col-md-6">
                            <div class="product-result">
                                <p>Showing 1-10 of 120 Products</p>
                            </div>
                        </div>
                        <div class="col-xl-5 offset-xl-2 col-lg-4 offset-lg-3 col-md-6">
                            <div class="filter-item-cat">
                                <select>
                                    <option>Sort By Popular</option>
                                    <option value="1">Sort By Most Popular</option>
                                    <option value="2">Sort By High To Low</option>
                                    <option value="3">Sort By Low To High</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-xxl-4 col-xl-6 col-lg-4 col-md-6 col-sm-6">
                            <div class="product-card style2">
                                <ul class="product-option list-style">
                                    <li>
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#product-modal"><i
                                                    class="flaticon-view"></i></button>
                                    </li>
                                    <li><a class="play-now" href="https://www.youtube.com/watch?v=i2luQk0IYAg"> <i
                                                    class="flaticon-play"></i></a>
                                    </li>
                                    <li><a href="compare.html"><i class="flaticon-compare"></i></a></li>
                                </ul>
                                <div class="product-img">
                                    <img src="/img/products/product-1.png" alt="image">
                                    <span class="promo-text style1">New</span>
                                    <button class="add-to-wishlist"><i class="flaticon-heart-1"></i><i
                                                class="flaticon-heart"></i></button>
                                </div>
                                <div class="product-info-wrap">
                                    <div class="product-info">
                                        <h3><a href="shop-details.html">Organic Apple</a></h3>
                                        <div class="ratings">
                                            <ul class="list-style">
                                                <li><i class="flaticon-star-2"></i></li>
                                                <li><i class="flaticon-star-2"></i></li>
                                                <li><i class="flaticon-star-2"></i></li>
                                                <li><i class="flaticon-star-2"></i></li>
                                                <li><i class="flaticon-star-1"></i></li>
                                            </ul>
                                            <span>(5)</span>
                                        </div>
                                        <p class="product-price"><span class="discount">$70</span>$60/Kg</p>
                                    </div>
                                    <a class="add-to-cart" href="cart.html">
                                        <i class="ri-shopping-cart-2-line"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-xl-6 col-lg-4 col-md-6 col-sm-6">
                            <div class="product-card style2">
                                <ul class="product-option list-style">
                                    <li>
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#product-modal"><i
                                                    class="flaticon-view"></i></button>
                                    </li>
                                    <li><a class="play-now" href="https://www.youtube.com/watch?v=i2luQk0IYAg"> <i
                                                    class="flaticon-play"></i></a>
                                    </li>
                                    <li><a href="compare.html"><i class="flaticon-compare"></i></a></li>
                                </ul>
                                <div class="product-img">
                                    <img src="/img/products/product-2.png" alt="image">
                                    <button class="add-to-wishlist"><i class="flaticon-heart-1"></i><i
                                                class="flaticon-heart"></i></button>
                                </div>
                                <div class="product-info-wrap">
                                    <div class="product-info">
                                        <h3><a href="shop-details.html">Organic Eggplant</a></h3>
                                        <div class="ratings">
                                            <ul class="list-style">
                                                <li><i class="flaticon-star-2"></i></li>
                                                <li><i class="flaticon-star-2"></i></li>
                                                <li><i class="flaticon-star-2"></i></li>
                                                <li><i class="flaticon-star-2"></i></li>
                                                <li><i class="flaticon-star-1"></i></li>
                                            </ul>
                                            <span>(5)</span>
                                        </div>
                                        <p class="product-price"><span class="discount">$60</span>$52/Kg</p>
                                    </div>
                                    <a class="add-to-cart" href="cart.html">
                                        <i class="ri-shopping-cart-2-line"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-xl-6 col-lg-4 col-md-6 col-sm-6">
                            <div class="product-card style2">
                                <ul class="product-option list-style">
                                    <li>
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#product-modal"><i
                                                    class="flaticon-view"></i></button>
                                    </li>
                                    <li><a class="play-now" href="https://www.youtube.com/watch?v=i2luQk0IYAg"> <i
                                                    class="flaticon-play"></i></a>
                                    </li>
                                    <li><a href="compare.html"><i class="flaticon-compare"></i></a></li>
                                </ul>
                                <div class="product-img">
                                    <img src="/img/products/product-21.png" alt="image">
                                    <span class="promo-text style2">Sale</span>
                                    <button class="add-to-wishlist"><i class="flaticon-heart-1"></i><i
                                                class="flaticon-heart"></i></button>
                                </div>
                                <div class="product-info-wrap">
                                    <div class="product-info">
                                        <h3><a href="shop-details.html">Organic Tomatoes</a></h3>
                                        <div class="ratings">
                                            <ul class="list-style">
                                                <li><i class="flaticon-star-2"></i></li>
                                                <li><i class="flaticon-star-2"></i></li>
                                                <li><i class="flaticon-star-2"></i></li>
                                                <li><i class="flaticon-star-2"></i></li>
                                                <li><i class="flaticon-star-1"></i></li>
                                            </ul>
                                            <span>(5)</span>
                                        </div>
                                        <p class="product-price">$30/Kg</p>
                                    </div>
                                    <a class="add-to-cart" href="cart.html">
                                        <i class="ri-shopping-cart-2-line"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-xl-6 col-lg-4 col-md-6 col-sm-6">
                            <div class="product-card style2">
                                <ul class="product-option list-style">
                                    <li>
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#product-modal"><i
                                                    class="flaticon-view"></i></button>
                                    </li>
                                    <li><a class="play-now" href="https://www.youtube.com/watch?v=i2luQk0IYAg"> <i
                                                    class="flaticon-play"></i></a>
                                    </li>
                                    <li><a href="compare.html"><i class="flaticon-compare"></i></a></li>
                                </ul>
                                <div class="product-img">
                                    <img src="/img/products/product-4.png" alt="image">
                                    <button class="add-to-wishlist"><i class="flaticon-heart-1"></i><i
                                                class="flaticon-heart"></i></button>
                                </div>
                                <div class="product-info-wrap">
                                    <div class="product-info">
                                        <h3><a href="shop-details.html">Fresh Watermelon</a></h3>
                                        <div class="ratings">
                                            <ul class="list-style">
                                                <li><i class="flaticon-star-2"></i></li>
                                                <li><i class="flaticon-star-2"></i></li>
                                                <li><i class="flaticon-star-2"></i></li>
                                                <li><i class="flaticon-star-2"></i></li>
                                                <li><i class="flaticon-star-1"></i></li>
                                            </ul>
                                            <span>(5)</span>
                                        </div>
                                        <p class="product-price">$42/Kg</p>
                                    </div>
                                    <a class="add-to-cart" href="cart.html">
                                        <i class="ri-shopping-cart-2-line"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-xl-6 col-lg-4 col-md-6 col-sm-6">
                            <div class="product-card style2">
                                <ul class="product-option list-style">
                                    <li>
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#product-modal"><i
                                                    class="flaticon-view"></i></button>
                                    </li>
                                    <li><a class="play-now" href="https://www.youtube.com/watch?v=i2luQk0IYAg"> <i
                                                    class="flaticon-play"></i></a>
                                    </li>
                                    <li><a href="compare.html"><i class="flaticon-compare"></i></a></li>
                                </ul>
                                <div class="product-img">
                                    <img src="/img/products/product-5.png" alt="image">
                                    <button class="add-to-wishlist"><i class="flaticon-heart-1"></i><i
                                                class="flaticon-heart"></i></button>
                                </div>
                                <div class="product-info-wrap">
                                    <div class="product-info">
                                        <h3><a href="shop-details.html">Green Brocoli</a></h3>
                                        <div class="ratings">
                                            <ul class="list-style">
                                                <li><i class="flaticon-star-2"></i></li>
                                                <li><i class="flaticon-star-2"></i></li>
                                                <li><i class="flaticon-star-2"></i></li>
                                                <li><i class="flaticon-star-2"></i></li>
                                                <li><i class="flaticon-star-1"></i></li>
                                            </ul>
                                            <span>(5)</span>
                                        </div>
                                        <p class="product-price">$52/Kg</p>
                                    </div>
                                    <a class="add-to-cart" href="cart.html">
                                        <i class="ri-shopping-cart-2-line"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-xl-6 col-lg-4 col-md-6 col-sm-6">
                            <div class="product-card style2">
                                <ul class="product-option list-style">
                                    <li>
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#product-modal"><i
                                                    class="flaticon-view"></i></button>
                                    </li>
                                    <li><a class="play-now" href="https://www.youtube.com/watch?v=i2luQk0IYAg"> <i
                                                    class="flaticon-play"></i></a>
                                    </li>
                                    <li><a href="compare.html"><i class="flaticon-compare"></i></a></li>
                                </ul>
                                <div class="product-img">
                                    <img src="/img/products/product-23.png" alt="image">
                                    <span class="promo-text style3">10% Off</span>
                                    <button class="add-to-wishlist"><i class="flaticon-heart-1"></i><i
                                                class="flaticon-heart"></i></button>
                                </div>
                                <div class="product-info-wrap">
                                    <div class="product-info">
                                        <h3><a href="shop-details.html">Fresh Milk</a></h3>
                                        <div class="ratings">
                                            <ul class="list-style">
                                                <li><i class="flaticon-star-2"></i></li>
                                                <li><i class="flaticon-star-2"></i></li>
                                                <li><i class="flaticon-star-2"></i></li>
                                                <li><i class="flaticon-star-2"></i></li>
                                                <li><i class="flaticon-star-1"></i></li>
                                            </ul>
                                            <span>(5)</span>
                                        </div>
                                        <p class="product-price"><span class="discount">$60</span>$52/Kg</p>
                                    </div>
                                    <a class="add-to-cart" href="cart.html">
                                        <i class="ri-shopping-cart-2-line"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-xl-6 col-lg-4 col-md-6 col-sm-6">
                            <div class="product-card style2">
                                <ul class="product-option list-style">
                                    <li>
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#product-modal"><i
                                                    class="flaticon-view"></i></button>
                                    </li>
                                    <li><a class="play-now" href="https://www.youtube.com/watch?v=i2luQk0IYAg"> <i
                                                    class="flaticon-play"></i></a>
                                    </li>
                                    <li><a href="compare.html"><i class="flaticon-compare"></i></a></li>
                                </ul>
                                <div class="product-img">
                                    <img src="/img/products/product-7.png" alt="image">
                                    <button class="add-to-wishlist"><i class="flaticon-heart-1"></i><i
                                                class="flaticon-heart"></i></button>
                                </div>
                                <div class="product-info-wrap">
                                    <div class="product-info">
                                        <h3><a href="shop-details.html">Organic Orange</a></h3>
                                        <div class="ratings">
                                            <ul class="list-style">
                                                <li><i class="flaticon-star-2"></i></li>
                                                <li><i class="flaticon-star-2"></i></li>
                                                <li><i class="flaticon-star-2"></i></li>
                                                <li><i class="flaticon-star-2"></i></li>
                                                <li><i class="flaticon-star-1"></i></li>
                                            </ul>
                                            <span>(5)</span>
                                        </div>
                                        <p class="product-price"><span class="discount">$70</span>$60/Kg</p>
                                    </div>
                                    <a class="add-to-cart" href="cart.html">
                                        <i class="ri-shopping-cart-2-line"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-xl-6 col-lg-4 col-md-6 col-sm-6">
                            <div class="product-card style2">
                                <ul class="product-option list-style">
                                    <li>
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#product-modal"><i
                                                    class="flaticon-view"></i></button>
                                    </li>
                                    <li><a class="play-now" href="https://www.youtube.com/watch?v=i2luQk0IYAg"> <i
                                                    class="flaticon-play"></i></a>
                                    </li>
                                    <li><a href="compare.html"><i class="flaticon-compare"></i></a></li>
                                </ul>
                                <div class="product-img">
                                    <img src="/img/products/product-9.png" alt="image">
                                    <span class="promo-text style1">New</span>
                                    <button class="add-to-wishlist"><i class="flaticon-heart-1"></i><i
                                                class="flaticon-heart"></i></button>
                                </div>
                                <div class="product-info-wrap">
                                    <div class="product-info">
                                        <h3><a href="shop-details.html">Organic Potato</a></h3>
                                        <div class="ratings">
                                            <ul class="list-style">
                                                <li><i class="flaticon-star-2"></i></li>
                                                <li><i class="flaticon-star-2"></i></li>
                                                <li><i class="flaticon-star-2"></i></li>
                                                <li><i class="flaticon-star-2"></i></li>
                                                <li><i class="flaticon-star-1"></i></li>
                                            </ul>
                                            <span>(5)</span>
                                        </div>
                                        <p class="product-price"><span class="discount">$70</span>$60/Kg</p>
                                    </div>
                                    <a class="add-to-cart" href="cart.html">
                                        <i class="ri-shopping-cart-2-line"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-xl-6 col-lg-4 col-md-6 col-sm-6">
                            <div class="product-card style2">
                                <ul class="product-option list-style">
                                    <li>
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#product-modal"><i
                                                    class="flaticon-view"></i></button>
                                    </li>
                                    <li><a class="play-now" href="https://www.youtube.com/watch?v=i2luQk0IYAg"> <i
                                                    class="flaticon-play"></i></a>
                                    </li>
                                    <li><a href="compare.html"><i class="flaticon-compare"></i></a></li>
                                </ul>
                                <div class="product-img">
                                    <img src="/img/products/product-44.png" alt="image">
                                    <span class="promo-text style1">New</span>
                                    <button class="add-to-wishlist"><i class="flaticon-heart-1"></i><i
                                                class="flaticon-heart"></i></button>
                                </div>
                                <div class="product-info-wrap">
                                    <div class="product-info">
                                        <h3><a href="shop-details.html">Sadin Fish</a></h3>
                                        <div class="ratings">
                                            <ul class="list-style">
                                                <li><i class="flaticon-star-2"></i></li>
                                                <li><i class="flaticon-star-2"></i></li>
                                                <li><i class="flaticon-star-2"></i></li>
                                                <li><i class="flaticon-star-2"></i></li>
                                                <li><i class="flaticon-star-1"></i></li>
                                            </ul>
                                            <span>(5)</span>
                                        </div>
                                        <p class="product-price"><span class="discount">$70</span>$60/Kg</p>
                                    </div>
                                    <a class="add-to-cart" href="cart.html">
                                        <i class="ri-shopping-cart-2-line"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="page-navigation mt-10">
                        <ul class="page-nav list-style">
                            <li><a href="shop-right-sidebar.html"><i class="flaticon-left-arrow"></i></a></li>
                            <li><a class="active" href="shop-right-sidebar.html">1</a></li>
                            <li><a href="shop-right-sidebar.html">2</a></li>
                            <li><a href="shop-right-sidebar.html">3</a></li>
                            <li><a href="shop-right-sidebar.html"><i class="flaticon-right-arrow"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop section end -->

</div>
<!-- Content Wrapper End -->