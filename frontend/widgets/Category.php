<?php


namespace frontend\widgets;


use yii\bootstrap5\Widget;

class Category extends Widget
{
    public function run()
    {
        return $this->render('category');
    }
}