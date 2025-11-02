<?php
$this->title = Yii::t('app', 'Mening izohlarim');
use common\models\Comment;
?>
<!-- Content Wrapper Start -->
<div class="content-wrapper">

    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap bg-f br-1">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-7 col-sm-8">
                    <div class="breadcrumb-title">
                        <h2><?=Yii::t('app', 'Mening izohlarim') ?></h2>
                        <ul class="breadcrumb-menu list-style">
                            <li><a href="index.html"><?=Yii::t('app', 'Asosiy') ?> </a></li>
                            <li><?=Yii::t('app', 'Mening izohlarim') ?></li>
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
                                <th scope="col"><?=Yii::t('app', 'Product') ?></th>
                                <th scope="col"><?=Yii::t('app', 'Izoh') ?></th>
                                <th scope="col"><?=Yii::t('app', 'Holat') ?></th>
                                <th scope="col"><?=Yii::t('app', 'Yozilgan vaqti') ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($models as $model): ?>
                            <tr>
                                <td>
                                    <div class="product_img-wrap">
                                        <div class="checkbox style2">
                                            <input type="checkbox" id="test_1">
                                            <label for="test_1"></label>
                                        </div>
                                        <div class="product_img">
                                            <img src="<?=$model->product->getImageFile()?>" alt="Image">
                                        </div>
                                        <div class="product_info">
                                            <h4><a href="shop-details.html"><?=$model->product->name?></a></h4>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p>
                                        <?=$model->comment?>
                                    </p>
                                </td>
                                <td>
                                    <p>
                                        <?=$model->getStatusName() ?>
                                    </p>
                                </td>
                                <td>
                                    <p>
                                        <?=date('d.m.Y | H:i', strtotime($model->created_at))?>
                                    </p>
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