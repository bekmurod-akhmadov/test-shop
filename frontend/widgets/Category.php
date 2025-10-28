<?php


namespace frontend\widgets;


use common\models\ProductCategory;
use yii\bootstrap5\Widget;

class Category extends Widget
{
    public function run()
    {
        $models = ProductCategory::find()->where(['status' => ProductCategory::STATUS_ACTIVE])->all();
        return $this->render('category', [
            'models' => $models
        ]);
    }
}