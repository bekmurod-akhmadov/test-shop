<?php

use wbraganca\dynamicform\DynamicFormWidget;
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use kartik\switchinput\SwitchInput;
use kartik\file\FileInput;
use common\models\ProductCategory;
use yii\helpers\ArrayHelper;
/** @var yii\web\View $this */
/** @var common\models\Product $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'category_id')->dropDownList(ArrayHelper::map(ProductCategory::find()->where(['status'=>ProductCategory::STATUS_ACTIVE])->all(), 'id', 'name'), ['prompt' => 'Kategoriyani tanlang']) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'discount_price')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-12">
                    <div class="row justify-content-between align-items-center my-3">
                        <div class="col-md-3">
                            <?= $form->field($model, 'status')->widget(SwitchInput::classname(), []); ?>
                        </div>
                        <div class="col-md-3">
                            <?= $form->field($model, 'accessory')->widget(SwitchInput::classname(), []); ?>
                        </div>
                        <div class="col-md-3">
                            <?= $form->field($model, 'in_stock')->widget(SwitchInput::classname(), []); ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
                </div>
                <div class="col-md-12">
                    <?= $form->field($model, 'body')->widget(\yii\redactor\widgets\Redactor::className(), [
                        'clientOptions' => [
                            'minHeight' => 200,
                            'plugins' => ['clips', 'fontcolor','imagemanager']
                        ]
                    ])?>
                </div>
                <div class="col-md-12">
                    <?= $form->field($model, 'image')->widget(FileInput::classname(), [
                        'options' => ['accept' => 'image/*'],
                    ]); ?>
                </div>
                <div class="col-md-12">
                    <?= $form->field($model, 'gallery[]')->widget(FileInput::classname(), [
                        'options' => ['accept' => 'image/*', 'multiple' => true],
                    ]); ?>
                </div>

                <div class="col-md-12 mt-3">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h4> Xususiyatlari</h4></div>
                        <div class="panel-body">
                            <?php DynamicFormWidget::begin([
                                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                                'widgetBody' => '.container-items', // required: css class selector
                                'widgetItem' => '.item', // required: css class
                                'limit' => 20, // the maximum times, an element can be cloned (default 999)
                                'min' => 1, // 0 or 1 (default 1)
                                'insertButton' => '.add-item', // css class
                                'deleteButton' => '.remove-item', // css class
                                'model' => $chars[0],
                                'formId' => 'w0',
                                'formFields' => [
                                    'name',
                                    'value',
                                ],
                            ]); ?>

                            <div class="container-items "><!-- widgetContainer -->
                                <?php foreach ($chars as $i => $char): ?>
                                    <div class="item panel panel-default my-2"><!-- widgetBody -->
                                        <div class="panel-heading">
                                            <div class="pull-right">
                                                <button type="button" class="add-item btn btn-success btn-xs">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                                <button type="button" class="remove-item btn btn-danger btn-xs">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="panel-body">
                                            <?php
                                            // necessary for update action.
                                            if (!$char->isNewRecord) {
                                                echo Html::activeHiddenInput($char, "[{$i}]id");
                                            }
                                            ?>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <?= $form->field($char, "[{$i}]name")->textInput(['maxlength' => true]) ?>
                                                </div>
                                                <div class="col-sm-6">
                                                    <?= $form->field($char, "[{$i}]value")->textInput(['maxlength' => true]) ?>
                                                </div>
                                            </div><!-- .row -->

                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <?php DynamicFormWidget::end(); ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group my-3">
                <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
