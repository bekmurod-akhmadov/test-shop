<?php


namespace backend\widgets;


use yii\bootstrap5\Widget;

class Sidebar extends Widget
{
    public function run()
    {
        return $this->render('sidebar');
    }
}