<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\NewsCategory;

/** @var yii\web\View $this */
/** @var common\models\NewsCategory $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'News Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="news-category-view">

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
                'attribute' => 'status',
                'value' => function(NewsCategory $model){
                    if($model->status == NewsCategory::STATUS_ACTIVE){
                        return '<span class="badge badge-success bg-success">Aktiv</span>';
                    }else{
                        return '<span class="badge badge-danger bg-danger">Mavjud emas</span>';
                    }
                },
                'contentOptions' => ['class' => 'v-align-middle'],
                'format' => 'raw',
            ],
        ],
    ]) ?>

</div>
