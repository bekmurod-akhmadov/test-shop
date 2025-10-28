<?php


namespace frontend\widgets;


use yii\bootstrap5\Widget;

class Footer extends Widget
{
    public function run()
    {
        return $this->render('footer');
    }
}