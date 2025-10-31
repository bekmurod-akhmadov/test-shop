 <!-- Content Wrapper Start -->
<div class="content-wrapper">

    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap bg-f br-1">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-7 col-sm-8">
                <div class="breadcrumb-title">
                    <h2>Savatcha</h2>
                    <ul class="breadcrumb-menu list-style">
                        <li><a href="<?= yii\helpers\Url::to(['site/index']) ?>">Bosh sahifa </a></li>
                        <li>Savatcha</li>
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
    <div class="cart-wrap ptb-100"  id="cart-index-block">
        <?php if(!empty($models)) : ?>
        <div class="container">
            <div class="row">
                <div class="col-xl-8">
                    <div class="cart-table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Tovar</th>
                                    <th scope="col">Narxi</th>
                                    <th scope="col">Soni</th>
                                    <th scope="col">Jami</th>
                                    <th scope="col">O'chirish</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $totalSum = 0;
                                $totalQty = 0;
                                foreach ($models as $model) : ?>
                                <?php
                                    $price = !empty($model->product->discount_price) ? $model->product->discount_price : $model->product->price;
                                    $totalSum += $price * $model->qty;
                                    $totalQty += $model->qty;
                                ?>
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
                                        <p class="cart-item-price"><?= number_format($price, 0, ',', ' ') ?> so`m/kg</p>
                                    </td>
                                    <td>
                                        <div class="product-quantity">
                                            <div class="qtySelector">
                                                <a href="<?=yii\helpers\Url::to(['cart/add-to-cart', 'id' => $model->product->id,'qty' => -1])?>" class="decreaseQty" data-id="<?= $model->product->id ?>">
                                                    <i class="ri-arrow-down-s-line"></i>
                                                </a>
                                                <input disabled type="text" class="qtyValue" value="<?= $model->qty ?>" />
                                                <a href="<?=yii\helpers\Url::to(['cart/add-to-cart', 'id' => $model->product->id,'qty' => 1])?>" class="increaseQty" data-id="<?= $model->product->id ?>">
                                                    <i class="ri-arrow-up-s-line"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="cart-item-price"><?= number_format($price * $model->qty, 0, ',', ' ') ?> so`m</p>
                                    </td>
                                    <td>
                                        <a class="delete-cart-index" data-id="<?= $model->product->id ?>" href="<?=yii\helpers\Url::to(['cart/remove-cart', 'id' => $model->product->id])?>">
                                            <i class="ri-delete-bin-6-line"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row py-4">
                        <div class="col-sm-6">
                            <a href="<?=yii\helpers\Url::to(['product/index'])?>" class="btn style1">Haridni davom ettirish</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="cart-total">
                        <h3 class="cart-box-title">Umumiy malumotlar</h3>
                        <div class="cart-total-item style2">
                            <p>Jami summa</p>
                            <span><?=number_format($totalSum, 0, ',', ' ')?> so`m</span>
                        </div>
                        <div class="cart-total-item style2">
                            <p>Jami mahsulot soni</p>
                            <span><b><?=number_format($totalQty, 0, ',', ' ')?> ta</b></span>
                        </div>
                        <a href="<?=yii\helpers\Url::to(['cart/checkout'])?>" class="btn style1 d-block w-100">Rasmiylashtirish</a>
                    </div>
                </div>
            </div>
        </div>
        <?php else: ?>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-warning">
                            Korzinka bo'sh
                        </div>
                        <a href="<?=yii\helpers\Url::to(['product/index'])?>" class="btn style1">Haridni davom ettirish</a>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <!-- Cart section end -->

</div>
<!-- Content Wrapper End -->