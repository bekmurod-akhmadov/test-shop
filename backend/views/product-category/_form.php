<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use kartik\switchinput\SwitchInput;
use kartik\file\FileInput;
use yii\helpers\ArrayHelper;
/** @var yii\web\View $this */
/** @var common\models\ProductCategory $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="product-category-form">

    <?php $form = ActiveForm::begin(); ?>

        <div class="card">
            <div class="card-body">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'parent_id')->dropDownList(ArrayHelper::map($model::find()->where(['parent_id' => null])->all(), 'id', 'name'), ['prompt' => 'Select Category']); ?>
                    </div>
                      <div class="col-md-6">
                        <?= $form->field($model, 'status')->widget(SwitchInput::classname(), []);?>
                    </div>
                </div>

                <?= $form->field($model, 'image')->widget(FileInput::classname(), [
                    'options' => ['accept' => 'image/*'],
                ]); ?>
 
                <div class="form-group my-3">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                </div>

            </div>
        </div>
    
    <?php ActiveForm::end(); ?>

</div>
