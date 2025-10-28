<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
/** @var yii\web\View $this */
/** @var common\models\User $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="card">
        <div class="card-body">
            
            <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'password')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'status')->dropDownList(
                [
                    $model::STATUS_ACTIVE => 'Faol',
                    $model::STATUS_INACTIVE => 'Nofaol',
                    $model::STATUS_DELETED => 'O‘chirilgan',
                ],
                ['prompt' => 'Holatni tanlang...']
            ) ?>
            <div class="form-group my-2">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
