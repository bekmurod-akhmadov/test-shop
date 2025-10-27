<?php

use common\models\News;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\NewsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'News';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create News', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'category_id',
                'value' => function(News $model){
                    return $model->category ? $model->category->name : '-';
                },
                'contentOptions' => ['class' => 'v-align-middle'],
                'filter' => \yii\helpers\Html::activeDropDownList(
                    $searchModel,
                    'category_id',
                    News::getCategories(),
                    ['class' => 'form-control', 'prompt' => 'Barchasi']
                ),
            ],
            [
                'attribute' => 'title',
                'contentOptions' => ['class' => 'v-align-middle'],
            ],
           [
                'attribute' => 'image',
                'format' => 'raw',
                'value'=> function(News $model){
                    $image = \common\components\StaticFunctions::getImage($model,'news','image');
                    return "<img src='$image' style='width: 100px;height: 80px;'>";
                },
                'contentOptions' => ['class' => 'v-align-middle'],
            ],
            //'created_at',
            //'updated_at',
           [
                'attribute' => 'status',
                'value' => function(News $model){
                    if($model->status == News::STATUS_ACTIVE){
                        return '<span class="badge badge-success bg-success">Aktiv</span>';
                    }else{
                        return '<span class="badge badge-danger bg-danger">Mavjud emas</span>';
                    }
                },
                'contentOptions' => ['class' => 'v-align-middle'],
                'format' => 'raw'
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
                'contentOptions' => ['class' => 'text-center v-align-middle', 'style' => 'white-space: nowrap;'],
            ],
        ],
    ]); ?>


</div>
