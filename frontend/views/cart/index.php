 <!-- Content Wrapper Start -->
<div class="content-wrapper">

    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap bg-f br-1">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-7 col-sm-8">
                <div class="breadcrumb-title">
                    <h2><?= Yii::t('app', 'Savatcha') ?></h2>
                    <ul class="breadcrumb-menu list-style">
                        <li><a href="<?= yii\helpers\Url::to(['site/index']) ?>"><?= Yii::t('app', 'Asosiy') ?> </a></li>
                        <li><?= Yii::t('app', 'Savatcha') ?></li>
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
                                    <th scope="col"><?= Yii::t('app', 'Tovar') ?></th>
                                    <th scope="col"><?= Yii::t('app', 'Narxi') ?></th>
                                    <th scope="col"><?= Yii::t('app', 'Soni') ?></th>
                                    <th scope="col"><?= Yii::t('app', 'Jami') ?></th>
                                    <th scope="col"><?= Yii::t('app', 'O`chirish') ?></th>
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
                                        <p class="cart-item-price"><?= number_format($price, 0, ',', ' ') ?> <?= Yii::t('app', 'so`m/Kg') ?></p>
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
                                        <p class="cart-item-price"><?= number_format($price * $model->qty, 0, ',', ' ') ?>  <?= Yii::t('app', 'so`m') ?></p>
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
                            <a href="<?=yii\helpers\Url::to(['product/index'])?>" class="btn style1"><?= Yii::t('app', 'Haridni davom ettirish') ?></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="cart-total">
                        <h3 class="cart-box-title"><?= Yii::t('app', 'Umumiy malumotlar') ?></h3>
                        <div class="cart-total-item style2">
                            <p><?= Yii::t('app', 'Jami summa') ?></p>
                            <span><?=number_format($totalSum, 0, ',', ' ')?> <?= Yii::t('app', 'so`m') ?></span>
                        </div>
                        <div class="cart-total-item style2">
                            <p><?= Yii::t('app', 'Jami mahsulot soni') ?></p>
                            <span><b><?=number_format($totalQty, 0, ',', ' ')?> <?= Yii::t('app', 'ta') ?></b></span>
                        </div>
                        <a href="<?=yii\helpers\Url::to(['cart/checkout'])?>" class="btn style1 d-block w-100"><?= Yii::t('app', 'Rasmiylashtirish') ?></a>
                    </div>
                </div>
            </div>
        </div>
        <?php else: ?>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-warning">
                            <?= Yii::t('app', 'Korzinka bo`sh') ?>
                        </div>
                        <a href="<?=yii\helpers\Url::to(['product/index'])?>" class="btn style1"><?= Yii::t('app', 'Haridni davom ettirish') ?></a>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <!-- Cart section end -->

</div>
<!-- Content Wrapper End -->