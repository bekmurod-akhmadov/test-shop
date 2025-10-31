 <!-- Content Wrapper Start -->
            <div class="content-wrapper">

                <!-- Breadcrumb Start -->
                <div class="breadcrumb-wrap bg-f br-1">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-7 col-sm-8">
                            <div class="breadcrumb-title">
                                <h2>Yoqtirganlarim</h2>
                                <ul class="breadcrumb-menu list-style">
                                    <li><a href="<?=yii\helpers\Url::to(['site/index'])?>">Asosiy </a></li>
                                    <li>Yoqtirganlarim</li>
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

                <!-- Cart section start -->
                <div class="cart-wrap ptb-100">
                    <div class="container">
                        <div class="row gx-5">
                            <div class="col-xl-12">
                                <div class="cart-table">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Mahsulot</th>
                                                <th scope="col">Narxi</th>
                                                <th scope="col">Mavudligi</th>
                                                <th scope="col">Savatga qo'shish</th>
                                                <th scope="col">O'chirish</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($models as $model): ?>
                                            <tr>
                                                <td>
                                                    <div class="product_img-wrap">
                                                       
                                                        <div class="product_img">
                                                            <img src="<?= $model->product->getImageFile() ?>" alt="Image">
                                                        </div>
                                                        <div class="product_info">
                                                            <h4><a href="<?= yii\helpers\Url::to(['product/view','id'=>$model->product->id]) ?>"><?= $model->product->name ?></a></h4>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <?php if ($model->product->discount_price) : ?>
                                                        <p class="product-price"><span class="discount"><?= number_format($model->product->price , '0', ' ', ' ') ?> so'm</span><?= number_format($model->product->discount_price , '0', ' ', ' ') ?> so'm</p>
                                                    <?php else : ?>
                                                        <p class="product-price"><?= number_format($model->product->price , '0', ' ', ' ') ?> so'm</p>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if ($model->product->in_stock) : ?>
                                                    <span class="badge bg bg-success promo-text text-light style1">Sotuvda mavjud</span>
                                                    <?php else : ?>
                                                    <span class="badge bg bg-danger promo-text text-light style1">Sotuvda mavjud emas</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td> 
                                                    <a class="btn style1 add-to-cart" data-id="<?= $model->product->id ?>" href="<?= yii\helpers\Url::to(['cart/add','id'=>$model->product->id]) ?>">Savatga qo'shish<i class="flaticon-shopping-cart"></i></a>
                                                </td>
                                                <td>
                                                    <a href="<?= yii\helpers\Url::to(['cart/wishlist-remove','id'=>$model->product->id]) ?>" class="cart-action" type="button">
                                                        <i class="ri-delete-bin-6-line"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Cart section end -->

            </div>
            <!-- Content Wrapper End -->