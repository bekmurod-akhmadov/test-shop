<?php

use common\models\Order;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\OrderSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Order', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'client_id',
            'address',
            'created_at',
            'total_count',
            //'total_price',
            //'status',
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
