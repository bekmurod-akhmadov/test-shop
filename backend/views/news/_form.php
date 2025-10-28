<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use common\models\NewsCategory;
use kartik\file\FileInput;
/** @var yii\web\View $this */
/** @var common\models\News $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
                    
                    <?= $form->field($model, 'category_id')->widget(Select2::class, [
                        'data' => \yii\helpers\ArrayHelper::map(NewsCategory::find()->all(), 'id', 'name'),
                        'options' => ['placeholder' => 'Kategoriyani tanlang...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]) ?>

                    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
                     

                    <?= $form->field($model, 'body')->widget(\yii\redactor\widgets\Redactor::className(), [
                        'clientOptions' => [
                            'minHeight' => 200,
                            'plugins' => ['clips', 'fontcolor','imagemanager']
                        ]
                    ])?>
                </div>
                
                <div class="col-md-4">
                    P
                    
                    <?= $form->field($model, 'image')->widget(FileInput::classname(), [
                        'options' => [
                            'accept' => 'image/*',
                        ],
                         'pluginOptions' => [
                            'showUpload' => false,
                            'showRemove' => false,
                            'showCancel' => false,
                            'fileActionSettings' => [
                                'showUpload' => false,
                                'showRemove' => false,
                                'showZoom' => true,
                                'showDrag' => false,
                            ],
                        ],
                    ]); ?>
                </div>
            </div>

            <div class="form-group">
                <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
