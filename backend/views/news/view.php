<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\News;
use common\models\NewsCategory;
use yii\helpers\ArrayHelper;
/** @var yii\web\View $this */
/** @var common\models\News $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'News', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="news-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tahrirlash', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('O`chirish', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Haqiqatdan o`chirishni xohlaysizmi?',
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
                'attribute' => 'category_id', 
                'value' => function($model){
                    return $model->category->name;
                },
                'contentOptions' => ['class' => 'v-align-middle'],
            ],
            'title',
            'description:ntext',
            'body:ntext',
            [
                'attribute' => 'image',
                'format' => 'raw',
                'value'=> function(News $model){
                    $image = \common\components\StaticFunctions::getImage($model,'news','image');
                    return "<img src='$image' style='width: 100px;height: 80px;'>";
                },
                'contentOptions' => ['class' => 'v-align-middle'],
            ],
            'created_at',
            'updated_at',
            [
                'attribute' => 'status',
                'value' => function($model){
                    if($model->status == News::STATUS_ACTIVE){
                        return '<span class="badge badge-success bg-success">Aktiv</span>';
                    }else{
                        return '<span class="badge badge-danger bg-danger">Mavjud emas</span>';
                    }
                },
                'contentOptions' => ['class' => 'v-align-middle'],
                'format' => 'raw'
            ],
        ],
    ]) ?>

</div>
