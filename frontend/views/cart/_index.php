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
                                                <span class="decreaseQty">
                                                    <i class="ri-arrow-down-s-line"></i>
                                                </span>
                                                <input type="text" class="qtyValue" value="<?= $model->qty ?>" />
                                                <span class="increaseQty">
                                                    <i class="ri-arrow-up-s-line"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="cart-item-price"><?= number_format($price * $model->qty, 0, ',', ' ') ?> so`m</p>
                                    </td>
                                    <td>
                                        <a class="delete-cart-index" data-id="<?= $model->product->id ?>" ?>" >
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