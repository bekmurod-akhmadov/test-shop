<?php

use common\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\UserSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php if(Yii::$app->user->can('user.create')): ?>
        <p>
            <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    <?php endif; ?>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            'email:email',
            [
                'attribute' => 'status',
                'value' => function ($model) {
                    return $model->status == User::STATUS_ACTIVE ? 'Active' : 'Inactive';
                },
            ],
            [
                'attribute' => 'created_at',
                'value' => function ($model) {
                    return date('Y-m-d H:i:s', $model->created_at);
                },
            ],
            //'verification_token',
            [
                'class' => \yii\grid\ActionColumn::className(),
                'template' => '{view} {update} {delete}', // qaysi tugmalar chiqishini belgilaydi
                'urlCreator' => function ($action, $model, $key, $index) {
                    return \yii\helpers\Url::to([$action, 'id' => $model->id]);
                },
                'buttons' => [
                    'view' => function ($url, $model) {
                        if(Yii::$app->user->can('user.view')){
                            return \yii\helpers\Html::a('<i class="fa fa-eye"></i>', $url, [
                                'class' => 'btn btn-sm btn-info',
                                'title' => 'Ko‘rish',
                            ]);
                        }
                    },
                    'update' => function ($url, $model) {
                        if(Yii::$app->user->can('user.update')){
                            return \yii\helpers\Html::a('<i class="fa fa-edit"></i>', $url, [
                                'class' => 'btn btn-sm btn-warning',
                                'title' => 'Tahrirlash',
                            ]);
                        }
                    },
                    'delete' => function ($url, $model) {
                        if(Yii::$app->user->can('user.delete')){
                            return \yii\helpers\Html::a('<i class="fa fa-trash"></i>', $url, [
                                'class' => 'btn btn-sm btn-danger',
                                'title' => 'O‘chirish',
                                'data-confirm' => 'Haqiqatan ham o‘chirilsinmi?',
                                'data-method' => 'post',
                            ]);
                        }
                    },
                ],
                'contentOptions' => ['class' => 'text-center', 'style' => 'white-space: nowrap;'],
            ],
        ],
    ]); ?>

</div>
