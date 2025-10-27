<?php
namespace common\components;

use Yii;

class Helper
{
    public static function getControllerName()
    {
        return Yii::$app->controller->id;
    }
}