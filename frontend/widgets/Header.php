<?php
namespace frontend\widgets;

class Header extends  \yii\bootstrap5\Widget
{
    public function run()
    {
        return $this->render('header');
    }
}