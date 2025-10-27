<?php


namespace frontend\widgets;


use yii\bootstrap5\Widget;

class MainBanner extends Widget
{
    public function run()
    {
        return $this->render('main-banner');
    }
}