<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Comment;

/** @var yii\web\View $this */
/** @var common\models\Comment $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Comments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="comment-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Orqaga qaytish', ['index'], ['class' => 'btn btn-primary']) ?>
        <?php if($model->status == Comment::STATUS_MODERATION): ?>
            <?= Html::a('Tasdiqlash', ['accept', 'id' => $model->id], [
                'class' => 'btn btn-success',
                'data' => [
                    'confirm' => 'Haqiqatan ham tasdiqlansinmi?',
                    'method' => 'post',
                ],
            ]) ?>
        <?php endif; ?> 
        
        <?php if($model->status == Comment::STATUS_ACCEPT): ?>
            <?= Html::a('Bekor qilish', ['cancel', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Haqiqatan ham bekor qilinsinmi?',
                    'method' => 'post',
                ],
            ]) ?>
        <?php endif; ?> 
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'product_id',
            'client_id',
            'comment:ntext',
            'created_at',
            'status',
        ],
    ]) ?>

</div>
