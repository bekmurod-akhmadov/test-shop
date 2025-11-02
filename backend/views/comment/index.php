<?php

use common\models\Comment;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\CommentSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Comments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comment-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'product_id',
            'client_id',
            'comment:ntext',
            'created_at',
            [
                'attribute' => 'status',
                'value' => function ($model) {
                    if($model->status == Comment::STATUS_MODERATION){
                        return '<span class="badge bg-warning">Moderatsiyada</span> <br>';
                    }else if($model->status == Comment::STATUS_ACCEPT){
                        return '<span class="badge bg-success">Tasdiqlangan</span> <br>';
                    }else{
                        return '<span class="badge bg-danger">Bekor qilingan</span> <br>';
                    }
                },
                'format' => 'raw',
            ],
            [
                'class' => \yii\grid\ActionColumn::className(),
                'template' => '{view}{accept}{cancel}', // qaysi tugmalar chiqishini belgilaydi
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
                    'accept' => function ($url, $model) {
                        if($model->status == Comment::STATUS_MODERATION){
                            return \yii\helpers\Html::a('<i class="fa fa-check"></i>', $url, [
                                'class' => 'btn btn-sm btn-success',
                                'title' => 'Tasdiqlash',
                                'data-confirm' => 'Haqiqatan ham tasdiqlansinmi?',
                                'data-method' => 'post',
                            ]);
                        }
                    },
                    'cancel' => function ($url, $model) {
                        if($model->status == Comment::STATUS_ACCEPT){
                            return \yii\helpers\Html::a('<i class="fa fa-times"></i>', $url, [
                                'class' => 'btn btn-sm btn-danger',
                                'title' => 'Bekor qilish',
                                'data-confirm' => 'Haqiqatan ham bekor qilinsinmi?',
                                'data-method' => 'post',
                            ]);
                        }
                    },
                ],
                'contentOptions' => ['class' => 'text-center v-align-middle', 'style' => 'white-space: nowrap;'],
            ],
        ],
    ]); ?>


</div>
