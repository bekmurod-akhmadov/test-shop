<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\ProductCategory;
/** @var yii\web\View $this */
/** @var common\models\ProductCategory $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Product Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-category-view">

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
                'attribute' => 'parent_id',
                'value' => function($model){
                    return $model->parent_id ? $model->parent->name : 'No parent';
                },
            ],
            [
                'attribute' => 'image',
                'format' => 'raw',
                'value'=> function($model){
                    $image = \common\components\StaticFunctions::getImage($model,'product-category','image');
                    return "<img src='$image' style='width: 100px;height: 80px;'>";
                },
                'contentOptions' => ['class' => 'v-align-middle'],
            ],
            [
                'attribute' => 'status',
                'value' => function($model){
                    if($model->status == ProductCategory::STATUS_ACTIVE){
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
