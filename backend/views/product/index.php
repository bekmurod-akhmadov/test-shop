<?php

use common\models\Product;
use common\models\ProductCategory;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\ProductSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .v-align-middle{
        vertical-align: middle;
    }
</style>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'name',
                'contentOptions' => ['class' => 'v-align-middle'],
            ],
            [
                'attribute' => 'category_id', 
                'value' => 'category.name',
                'filter' => ArrayHelper::map(ProductCategory::find()->where(['status' => ProductCategory::STATUS_ACTIVE])->all(), 'id', 'name'),
                'contentOptions' => ['class' => 'v-align-middle'],
            ],
            [
                'attribute' => 'price',
                'contentOptions' => ['class' => 'v-align-middle'],
            ],
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
            [
                'attribute' => 'image',
                'format' => 'raw',
                'content'=> function($model){
                    $image = \common\components\StaticFunctions::getImage($model,'product','image');
                    return "<img src='$image' style='width: 100px;height: 80px;'>";
                },
                'contentOptions' => ['class' => 'v-align-middle'],
            ],
            //'description:ntext',
            //'body:ntext',
            //'created_at',
            //'updated_at',
            //'status',
            //'accessory',
            [
                'class' => \yii\grid\ActionColumn::className(),
                'template' => '{view} {update} {delete}', // qaysi tugmalar chiqishini belgilaydi
                'urlCreator' => function ($action, $model, $key, $index) {
                    return \yii\helpers\Url::to([$action, 'id' => $model->id]);
                },
                'buttons' => [
                    'view' => function ($url, $model) {
                        return \yii\helpers\Html::a('<i class="fa fa-eye"></i>', $url, [
                            'class' => 'btn btn-sm btn-info',
                            'title' => 'Ko‘rish',
                        ]);
                    },
                    'update' => function ($url, $model) {
                        return \yii\helpers\Html::a('<i class="fa fa-edit"></i>', $url, [
                            'class' => 'btn btn-sm btn-warning',
                            'title' => 'Tahrirlash',
                        ]);
                    },
                    'delete' => function ($url, $model) {
                        return \yii\helpers\Html::a('<i class="fa fa-trash"></i>', $url, [
                            'class' => 'btn btn-sm btn-danger',
                            'title' => 'O‘chirish',
                            'data-confirm' => 'Haqiqatan ham o‘chirilsinmi?',
                            'data-method' => 'post',
                        ]);
                    },
                ],
                'contentOptions' => ['class' => 'text-center', 'style' => 'white-space: nowrap;'],
            ],
        ],
    ]); ?>


</div>
