<?php


namespace frontend\widgets;
use common\models\Product;

use yii\bootstrap5\Widget;

class DiscountProducts extends Widget
{
    public function run()
    {
        $models = Product::find()
        ->where(['status' => Product::STATUS_ACTIVE])
        ->andWhere(['IS NOT', 'discount_price', null])
        ->limit(20)
        ->all();
        return $this->render('discount-products', [
            'models' => $models
        ]);
    }
}