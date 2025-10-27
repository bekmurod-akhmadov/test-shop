<?php

use common\models\ProductCategory;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var common\models\ProductCategorySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Product Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Product Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'name',
                'contentOptions' => ['class' => 'v-align-middle'],
            ],
            [
                'attribute' => 'parent_id',
                'value' => function ($model) {
                    if($model->parent_id && $model->parent){
                        return $model->parent->name;
                    }else{
                        return '';
                    }
                },
                'contentOptions' => ['class' => 'v-align-middle'],
                'filter' => ArrayHelper::map(ProductCategory::find()->where(['status' => ProductCategory::STATUS_ACTIVE, 'parent_id' => null])->all(), 'id', 'name'),
            ],
            [
                'attribute' => 'status',
                'value' => function($model){
                    if($model->status == 1){
                        return '<span class="badge badge-success bg-success">Active</span>';
                    }else{
                        return '<span class="badge badge-danger bg-danger">Inactive</span>';
                    }
                },
                'contentOptions' => ['class' => 'v-align-middle'],
                'format' => 'raw',
                'filter' => false,
            ],
            [
                'attribute' => 'image',
                'format' => 'raw',
                'content'=> function($model){
                    $image = \common\components\StaticFunctions::getImage($model,'product-category','image');
                    return "<img src='$image' style='width: 100px;height: 80px;'>";
                },
                'contentOptions' => ['class' => 'v-align-middle'],
            ],
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
