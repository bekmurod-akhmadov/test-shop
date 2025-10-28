<?php


namespace frontend\widgets;

use common\models\Product;
use yii\bootstrap5\Widget;

class LastProducts extends Widget
{
    public function run()
    {
        $models = Product::find()
        ->where(['status' => Product::STATUS_ACTIVE])
        ->orderBy(['created_at' => SORT_DESC])
        ->limit(20)
        ->all();
        return $this->render('last-products', [
            'models' => $models
        ]);
    }
}