<?php


namespace backend\models;


use  Yii;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

class CommonModels extends ActiveRecord
{
    public static function createMultiple($modelClass, $multipleModels = [])
    {
        $model    = new $modelClass;
        $formName = $model->formName();
        $post     = Yii::$app->request->post($formName);
        $models   = [];

        if (! empty($multipleModels)) {
            $keys = array_keys(ArrayHelper::map($multipleModels, 'id', 'id'));
            $multipleModels = array_combine($keys, $multipleModels);
        }

        if ($post && is_array($post)) {
            foreach ($post as $i => $item) {
                if (isset($item['id']) && !empty($item['id']) && isset($multipleModels[$item['id']])) {
                    $models[] = $multipleModels[$item['id']];
                } else {
                    $models[] = new $modelClass;
                }
            }
        }

        unset($model, $formName, $post);

        return $models;
    }

    public static function loadMultiple($models, $data, $formName = null)
    {
        if ($formName === null) {
            /* @var $model ActiveRecord */
            $model = reset($models);
            if ($model === false) {
                return false;
            }
            $formName = $model->formName();
        }

        $success = false;
        foreach ($models as $i => $model) {
            if (isset($data[$formName][$i])) {
                if ($model->load($data[$formName][$i], '')) {
                    $success = true;
                }
            }
        }

        return $success;
    }

    public static function validateMultiple($models, $attributes = null)
    {
        $valid = true;
        /* @var $model ActiveRecord */
        foreach ($models as $model) {
            $valid = $model->validate($attributes) && $valid;
        }

        return $valid;
    }

}