<?php
namespace backend\widgets;

use yii\bootstrap5\Widget;

class Header extends Widget
{
    public function run()
    {
        return $this->render('header');
    }
}