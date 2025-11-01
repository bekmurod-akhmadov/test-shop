<?php
    $this->title = "Buyurtma ko'rish";
    use frontend\widgets\ProfileSidebr;
?>

<!-- Content Wrapper Start -->
<div class="content-wrapper">

    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap bg-f br-1">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-7 col-sm-8">
                    <div class="breadcrumb-title">
                        <h2>#<?=$order->id?> | Buyurtma ko'rish</h2>
                        <ul class="breadcrumb-menu list-style">
                            <li><a href="<?=yii\helpers\Url::home()?>">Asosiy </a></li>
                            <li>#<?=$order->id?> | Buyurtma ko'rish</li>
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
                <?=ProfileSidebr::widget()?>
                
                <div class="col-xxl-9 col-xl-8 col-lg-12 order-xl-2 order-lg-1 order-md-1 order-1">
                    <div class="row">
                         <div class="col-xl-12">
                                <div class="cart-table" >
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Rasm</th>
                                                <th scope="col">Nomi</th>
                                                <th scope="col">Narxi</th>
                                                <th scope="col">Soni</th>
                                                <th scope="col">Jami Summa</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($models as $model): ?>
                                                <tr>
                                                    <td><img src="<?=$model->product->getImageFile()?>" alt="Image"></td>
                                                    <td><?=$model->product->name?></td>
                                                    <td><?=number_format($model->product->price, 0, ',', ' ')?> So`m</td>
                                                    <td><?=$model->qty?></td>
                                                    <td><?=number_format($model->product->price * $model->qty, 0, ',', ' ')?> So`m</td>
                                                </tr>
                                            <?php endforeach; ?>
                                            <tr>
                                                <td colspan="4">Jami</td>
                                                <td><?=number_format($order->total_price, 0, ',', ' ')?> So`m</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop section end -->

</div>