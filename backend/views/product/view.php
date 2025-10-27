<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;
use common\models\ProductCategory;
use common\models\Product;

/** @var yii\web\View $this */
/** @var common\models\Product $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-view">

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
            'name',
            [
                'attribute' => 'category_id', 
                'value' => 'category.name',
                'filter' => ArrayHelper::map(ProductCategory::find()->where(['status' => 1])->all(), 'id', 'name'),
                'contentOptions' => ['class' => 'v-align-middle'],
            ],
            'price',
            'discount_price',
        
            [
                'attribute' => 'in_stock',
                'value' => function($model){
                    if($model->in_stock == 1){
                        return '<span class="badge badge-success bg-success">Mavjud</span>';
                    }else{
                        return '<span class="badge badge-danger bg-danger">Mavjud emas</span>';
                    }
                },
                'contentOptions' => ['class' => 'v-align-middle'],
                'format' => 'raw'
            ],
            'description:ntext',
            'body:ntext',
            'created_at',
            'updated_at',
            [
                'attribute' => 'status',
                'value' => function($model){
                    if($model->status == Product::STATUS_ACTIVE){
                        return '<span class="badge badge-success bg-success">Aktiv</span>';
                    }else{
                        return '<span class="badge badge-danger bg-danger">Mavjud emas</span>';
                    }
                },
                'contentOptions' => ['class' => 'v-align-middle'],
                'format' => 'raw'
            ],
            [
                'attribute' => 'accessory',
                'value' => function($model){
                    if($model->accessory == Product::ACCESSORY_ACTIVE){
                        return '<span class="badge badge-success bg-success">Aksessuar</span>';
                    }

                    return '';
                },
                'contentOptions' => ['class' => 'v-align-middle'],
                'format' => 'raw'
            ],
            [
                'attribute' => 'image',
                'format' => 'raw',
                'value'=> function($model){
                    $image = \common\components\StaticFunctions::getImage($model,'product','image');
                    return "<img src='$image' style='width: 100px;height: 80px;'>";
                },
                'contentOptions' => ['class' => 'v-align-middle'],
            ],
        ],
    ]) ?>

    <div class="image-block my-3">
        <div class="row">
            <?php if(!empty($model->productImages)): ?>
                <?php foreach ($model->productImages as $key => $value) :?>
                    <div class="col-md-3">
                        <img src="<?=Yii::$app->params['frontend'] . Yii::$app->params['uploads_url']  ?>/product/<?=$value->product_id?>/m_<?=$value->image?>" style="width: 100px;height: 80px;">
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

