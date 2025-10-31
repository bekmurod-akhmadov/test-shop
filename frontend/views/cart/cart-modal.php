<?php if (!empty($models)):?>
<div class="cart-popup-body">
    <?php $total = 0;  foreach ($models as $model): ?>
        <?php
            $price = !empty($model->product->discount_price) ? $model->product->discount_price : $model->product->price;
            $total += $price * $model->qty;
        ?>
        <div class="cart-item d-flex align-items-center justify-content-between">
            <div class="cart-item-img">
                <img src="<?= $model->product->getImageFile() ?>" alt="Image">
            </div>
            <div class="cart-item-info" style="width: 40%;">
                <h5><a href="<?=yii\helpers\Url::to(['product/view', 'id' => $model->product->id])?>"><?= $model->product->name ?></a></h5>
                <?php if ($model->product->discount_price) : ?>
                    <p class="product-price"><span class="discount"><?= number_format($model->product->price , '0', ' ', ' ') ?> so'm</span><?= number_format($model->product->discount_price , '0', ' ', ' ') ?> so'm</p>
                <?php else : ?>
                    <p class="product-price"><?= number_format($model->product->price , '0', ' ', ' ') ?> so'm</p>
                <?php endif; ?>
            </div>
            <div class="cart-item-qty calculate" style="max-width: 100px;">
                <div class="quantity d-flex align-items-center">
                    <span data-id="<?= $model->product->id ?>" class="counter_btn qty-minus"><i class="ri-subtract-line"></i></span>
                    <input disabled style="width: 35px;text-align:center" type="text" name="qty" id="qty" value="<?= $model->qty?? '1' ?>">
                    <span data-id="<?= $model->product->id ?>" class="counter_btn qty-plus"><i class="ri-add-line"></i></span>
                </div>
            </div>
            <div class="cart-item-action d-flex">
                <span style="cursor:pointer;" data-id="<?= $model->product->id ?>" class="delete-from-cart">
                    <i style="font-size: 25px;" class="ri-close-circle-fill"></i>
                </span>
            </div>
        </div>
    <?php endforeach?>
</div>
<div class="cart-popup-footer">
    <div class="total-amt">
        <h5>Jami summa: </h5>
        <h5><?= number_format($total , '0', ' ', ' ') ?> so'm</h5>
    </div>
    <div class="cart-popup-btn">
        <a href="<?=yii\helpers\Url::to(['cart/index'])?>" class="btn style1">Savatchaga o'tish</a>
        <a href="<?=yii\helpers\Url::to(['cart/checkout'])?>" class="btn style3">Rasmiylashtirish</a>
    </div>
</div>
<?php else: ?>
    <div class="alert alert-warning" style="margin-top:100px;">
        <p>Savatcha bo'sh</p>
    </div>
<?php endif?>

<style>
    .counter_btn{
        width: 35px;
        height: 35px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        border: 1px solid #ccc;
        border-radius: 50%;
    }
    .counter_btn:hover{
        background-color: #ccc;
        color:#fff;
    }
</style>
