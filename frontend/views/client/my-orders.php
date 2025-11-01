<?php
$this->title = "Buyurtmalarim";
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
                        <h2>Buyurtmalarim</h2>
                        <ul class="breadcrumb-menu list-style">
                            <li><a href="<?=yii\helpers\Url::home()?>">Asosiy </a></li>
                            <li>Buyurtmalarim</li>
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
                                <div class="cart-table">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Buyurtma raqami</th>
                                                <th scope="col">Buyurtma sana</th>
                                                <th scope="col">Jami Summa</th>
                                                <th scope="col">Jami Soni</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Qo'shimcha</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($models as $model): ?>
                                            <tr>
                                                <td>#<?=$model->id?></td>
                                                <td><?=date('Y-m-d | H:i', strtotime($model->created_at))?></td>
                                                <td><?=number_format($model->total_price, 0, ',', ' ')?> So`m</td>
                                                <td><?=$model->total_count?></td>
                                                <td><?php if($model->status == $model::STATUS_NEW){
                                                    echo 'Yangi';
                                                }elseif($model->status == $model::STATUS_PAID){
                                                    echo "Yig'ilmoqda";
                                                }elseif($model->status == $model::STATUS_SHIPPED){
                                                    echo 'Yuborildi';
                                                }elseif($model->status == $model::STATUS_DELIVERED){
                                                    echo 'Yetkazildi';
                                                }elseif($model->status == $model::STATUS_CANCELLED){
                                                    echo 'Bekor qilindi';
                                                }?></td>
                                                <td>
                                                    <a href="<?=yii\helpers\Url::toRoute(['client/order-view', 'id' => $model->id])?>" class="btn style1">Buyurtmani ko'rish</a>
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
        </div>
    </div>
    <!-- Shop section end -->

</div>
<!-- Content Wrapper End -->