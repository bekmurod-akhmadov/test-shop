<?php
$this->title = 'Rasmiylashtirish';
use yii\helpers\Url;
use yii\bootstrap5\ActiveForm;
?>
 <!-- Content Wrapper Start -->
            <div class="content-wrapper">

                <!-- Breadcrumb Start -->
                <div class="breadcrumb-wrap bg-f br-1">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-7 col-sm-8">
                                <div class="breadcrumb-title">
                                    <h2><?= Yii::t('app', 'Rasmiylashtirish') ?></h2>
                                    <ul class="breadcrumb-menu list-style">
                                        <li><a href="<?=Url::to(['site/index'])?>"><?= Yii::t('app', 'Asosiy') ?> </a></li>
                                        <li><?= Yii::t('app', 'Rasmiylashtirish') ?></li>
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
                <?php if(!empty($client)): ?>
                <!-- Checkout section start -->
                <div class="checkout-wrap pt-100 pb-75">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-7 col-lg-7">
                                <?php if(!$client->isCompleted()): ?>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="checkout-promobox">
                                        <p class="mb-0"><?= Yii::t('app', 'Buyurtmani rasmiylashtirish uchun shaxsiy malumotlaringizni') ?> <a href="<?=Url::to(['client/settings'])?>" class="link style1"><?= Yii::t('app', 'to`ldiring') ?></a></p>
                                        </div>
                                    </div>
                               </div>
                                <?php else: ?>
                                <?php $form = ActiveForm::begin([
                                    'id' => 'checkout-form',
                                    'action' => Url::to(['cart/checkout'])
                                ]); ?>    
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h3 class="checkout-box-title"><?= Yii::t('app', 'Shaxsiy ma`lumotlar') ?></h3>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <?= $form->field($client, 'first_name')->textInput([
                                                    'placeholder' => 'Ismingiz',
                                                    'value' => $client->first_name ?? '',
                                                    'readonly' => true,
                                                    'class' => 'form-control'
                                                ])->label(false) ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <?= $form->field($client, 'last_name')->textInput([
                                                    'placeholder' => 'Familiyangiz',
                                                    'value' => $client->last_name ?? '',
                                                    'readonly' => true
                                                ])->label(false) ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <?= $form->field($client, 'email')->textInput([
                                                    'placeholder' => 'Emailingiz',
                                                    'value' => $client->email ?? '',
                                                    'readonly' => true
                                                ])->label(false) ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <?= $form->field($client, 'phone')->textInput([
                                                    'placeholder' => 'Telefon raqamingiz',
                                                    'value' => $client->phone ?? '',
                                                    'readonly' => true
                                                ])->label(false) ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <?=$form->field($client, 'address_id')->dropDownList(
                                                    $client->getAddressesList(),[
                                                    'prompt'=>Yii::t('app', 'Manzilni tanlang'),
                                                    'required' => true,
                                                ])->label(false)?>
                                            </div>
                                        </div>
                                        <?php if($client->isCompleted()): ?>
                                            <?=yii\helpers\Html::submitButton(Yii::t('app', 'Buyurtmani rasmiylashtirish'), ['class' => 'btn style1 d-block w-100 mt-25'])?>
                                        <?php endif ?>
                                    </div>
                                <?php $form->end() ?>
                                <?php endif ?>
                            </div>
                            <div class="col-xl-5 col-lg-5">
                                <div class="checkout-details bg-albastor">
                                    <h3 class="checkout-box-title"><?= Yii::t('app', 'Buyurtmalaringiz') ?></h3>
                                    <?php if(!empty($carts)): ?>
                                        <?php foreach($carts as $cart): ?>
                                            <div class="checkout_items">
                                                <div class="checkout_items-img">
                                                    <img src="<?= $cart->product->getImageFile() ?>" alt="Image">
                                                </div>
                                                <div class="checkout_items-info">
                                                    <h5><a href="<?=yii\helpers\Url::to(['product/view', 'id' => $cart->product->id])?>"><?= $cart->product->name ?></a></h5>
                                                </div>
                                                <div class="checkout_items-amt">
                                                    X <?=$cart->qty?>
                                                </div>
                                                <div class="checkout_items_price">
                                                    <?= number_format($cart->product->actualPrice(),'0', ' ', ' ' )?> <?= Yii::t('app', 'so`m/Kg') ?>
                                                </div>
                                            </div>
                                        <?php endforeach ?>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Checkout section end -->
                 <?php endif ?>

            </div>
            <!-- Content Wrapper End -->