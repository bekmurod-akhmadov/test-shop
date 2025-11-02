<?php
$this->title = Yii::t('app', 'Buyurtmani ko`rish')
?>
<div class="content-wrapper">
<div class="breadcrumb-wrap bg-f br-1">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-7 col-sm-8">
                <div class="breadcrumb-title">
                    <h2>#<?=$order->id?> | <?= Yii::t('app', 'Buyurtmani ko`rish') ?></h2>
                    <ul class="breadcrumb-menu list-style">
                        <li><a href="<?=yii\helpers\Url::home()?>"><?= Yii::t('app', 'Asosiy') ?> </a></li>
                        <li>#<?=$order->id?> | <?= Yii::t('app', 'Buyurtmani ko`rish') ?></li>
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
<div class="container my-4">
    <div class="row">
        <div class="col-lg-12">
            <div class="cart-table" style="margin-top:200px;display: block !important; opacity: 1 !important; visibility: visible !important; position: relative !important;">
                <table class="table" style="display: table !important; opacity: 1 !important; visibility: visible !important; width: 100% !important;">
                    <thead style="display: table-header-group !important; opacity: 1 !important; visibility: visible !important;">
                    <tr style="display: table-row !important; opacity: 1 !important; visibility: visible !important;">
                        <th scope="col" style="display: table-cell !important; opacity: 1 !important; visibility: visible !important; padding: 10px !important; background: #f5f5f5 !important; border: 1px solid #ddd !important;"><?= Yii::t('app', 'Rasm') ?></th>
                        <th scope="col" style="display: table-cell !important; opacity: 1 !important; visibility: visible !important; padding: 10px !important; background: #f5f5f5 !important; border: 1px solid #ddd !important;"><?= Yii::t('app', 'Nomi') ?></th>
                        <th scope="col" style="display: table-cell !important; opacity: 1 !important; visibility: visible !important; padding: 10px !important; background: #f5f5f5 !important; border: 1px solid #ddd !important;"><?= Yii::t('app', 'Narxi') ?></th>
                        <th scope="col" style="display: table-cell !important; opacity: 1 !important; visibility: visible !important; padding: 10px !important; background: #f5f5f5 !important; border: 1px solid #ddd !important;"><?= Yii::t('app', 'Soni') ?></th>
                        <th scope="col" style="display: table-cell !important; opacity: 1 !important; visibility: visible !important; padding: 10px !important; background: #f5f5f5 !important; border: 1px solid #ddd !important;"><?= Yii::t('app', 'Jami Summa') ?></th>
                    </tr>
                    </thead>
                    <tbody style="display: table-row-group !important; opacity: 1 !important; visibility: visible !important;">
                    <?php foreach ($models as $model): ?>
                        <tr style="display: table-row !important; opacity: 1 !important; visibility: visible !important;">
                            <td style="display: table-cell !important; opacity: 1 !important; visibility: visible !important; padding: 10px !important; border: 1px solid #ddd !important;">
                                <img src="<?=$model->product->getImageFile()?>" alt="Image" style="max-width: 80px !important; display: block !important;">
                            </td>
                            <td style="display: table-cell !important; opacity: 1 !important; visibility: visible !important; padding: 10px !important; border: 1px solid #ddd !important;">
                                <a style="color:blue;" href="<?=\yii\helpers\Url::to(['product/view' , 'id' => $model->product->id])?>"><?=$model->product->name?></a>
                            </td>
                            <td style="display: table-cell !important; opacity: 1 !important; visibility: visible !important; padding: 10px !important; border: 1px solid #ddd !important;">
                                <?=number_format($model->product->price, 0, ',', ' ')?> <?= Yii::t('app', 'so`m') ?>
                            </td>
                            <td style="display: table-cell !important; opacity: 1 !important; visibility: visible !important; padding: 10px !important; border: 1px solid #ddd !important;">
                                <?=$model->qty?>
                            </td>
                            <td style="display: table-cell !important; opacity: 1 !important; visibility: visible !important; padding: 10px !important; border: 1px solid #ddd !important;">
                                <?=number_format($model->product->price * $model->qty, 0, ',', ' ')?> <?= Yii::t('app', 'so`m') ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <tr style="display: table-row !important; opacity: 1 !important; visibility: visible !important; background: #f0f0f0 !important;">
                        <td colspan="4" style="display: table-cell !important; opacity: 1 !important; visibility: visible !important; padding: 10px !important; border: 1px solid #ddd !important; font-weight: bold !important;">
                            <?= Yii::t('app', 'Jami') ?>
                        </td>
                        <td style="display: table-cell !important; opacity: 1 !important; visibility: visible !important; padding: 10px !important; border: 1px solid #ddd !important; font-weight: bold !important;">
                            <?=number_format($order->total_price, 0, ',', ' ')?> <?= Yii::t('app', 'so`m') ?>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>