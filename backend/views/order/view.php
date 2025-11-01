<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Order $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="order-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tahrirlash', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('O‘chirish', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Haqiqatan ham o‘chirilsinmi?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Orqaga', ['index'], ['class' => 'btn btn-secondary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'client_id',
                'value' => function ($model) {
                    if($model->client){
                        return $model->client->first_name . ' ' . $model->client->last_name;
                    }
                    return 'Mijoz topilmadi';
                },
            ],
            'address',
            'created_at',
            'total_count',
            'total_price',
            [
                'attribute' => 'status',
                'value' => function ($model) {
                    if($model->status == $model::STATUS_NEW){
                        return 'Yangi';
                    }elseif($model->status == $model::STATUS_PAID){
                        return 'To‘langan';
                    }elseif($model->status == $model::STATUS_SHIPPED){
                        return 'Yuborildi';
                    }elseif($model->status == $model::STATUS_DELIVERED){
                        return 'Yetkazib berildi';
                    }elseif($model->status == $model::STATUS_CANCEL ){
                        return 'Bekor qilindi';
                    }
                },
            ],
        ],
    ]) ?>
    <div class="row">
        <h3>Buyurtma qilingan mahsulotlar</h3>
        <div class="col-lg-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Count</th>
                        <th>Price</th>
                        <th>Sum</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($model->orderItems as $item): ?>
                        <tr>
                            <td>
                                <img src="<?= $item->product->getImageFile() ?>" alt="" style="width: 50px; height: 50px;">
                            </td>
                            <td><?= $item->product->name ?></td>
                            <td><?= $item->qty ?></td>
                            <td><?= number_format($item->product->actualPrice(), '0', ' ', ' ') ?> so'm</td>
                            <td><?= number_format($item->qty * $item->product->actualPrice(), '0', ' ', ' ') ?> so'm</td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="4" class="text-end">Jami:</td>
                        <td><?= number_format($model->total_price, '0', ' ', ' ') ?> so'm</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
