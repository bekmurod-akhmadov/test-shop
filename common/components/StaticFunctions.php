<?php

namespace common\components;

use common\models\Languages;
use common\models\NewsCategory;
use yii\helpers\FileHelper;
use common\components\ImageResize;
use common\models\Settings;
use common\models\Cart;
use common\models\Wishlist;
use Yii;

class StaticFunctions {

    public static function saveImage($FILE, $POST_ID, $POST_TYPE = 'post', $CROP_LARGE = true )
    {

        if( !empty( $FILE ) ) {

            $EXT = $FILE->extension == 'php' || $FILE->extension == 'js' ? 'file' : $FILE->extension;
            $DIR = realpath(dirname(__FILE__)) . '/../../' . Yii::$app->params['uploads_dir'] . '/' . $POST_TYPE . '/' . $POST_ID . '/';
            $FILENAME = md5(time() . Yii::$app->user->id . $FILE->name . rand(1, 1000000) . rand(1, 1000000)) . '.' . $EXT;
            
            FileHelper::createDirectory( $DIR );

            if($FILE->saveAs( $DIR . 'l_' . $FILENAME)) {

                $image = new ImageResize( $DIR . 'l_' . $FILENAME );

                if($CROP_LARGE == true)
                {
                    $image
                        ->resizeToBestFit(Yii::$app->params['large_image']['width'], Yii::$app->params['large_image']['height'])
                        ->save($DIR . 'l_' . $FILENAME);
                }

                $image
                    ->resizeToWidth(Yii::$app->params['medium_image']['width'])
                    ->save( $DIR . 'm_' . $FILENAME)

                    ->crop(Yii::$app->params['small_image']['width'], Yii::$app->params['small_image']['height'])
                    ->save( $DIR . 's_' . $FILENAME);

                return $FILENAME;

            }
        }

        return '';

    }

    public static function saveFile($FILE, $POST_ID, $POST_TYPE = 'post' )
    {

        if( !empty( $FILE ) && !($FILE->extension == 'php' || $FILE->extension == 'js')) {

            $DIR = realpath(dirname(__FILE__)) . '/../../' . Yii::$app->params['uploads_dir'] . '/' . $POST_TYPE . '/' . $POST_ID . '/';
            $FILENAME = $FILE->name;

            FileHelper::createDirectory( $DIR );

            if($FILE->saveAs( $DIR  . $FILENAME)) {

                return $FILENAME;

            }
        }

        return '';

    }

    public static function deleteFile( $FILENAME, $POST_ID, $POST_TYPE = 'post' )
    {
        $DIR = realpath( dirname( __FILE__ ) ) . '/../../' . Yii::$app->params['uploads_dir'] . '/' . $POST_TYPE . '/' . $POST_ID . '/';
        $DIR = $DIR . $FILENAME;
        if( !is_dir( $DIR) && file_exists( $DIR) )
            unlink( $DIR );
    }

    public static function deleteImage( $FILENAME, $POST_ID, $POST_TYPE = 'post' )
    {

        $DIR = realpath( dirname( __FILE__ ) ) . '/../../' . Yii::$app->params['uploads_dir'] . '/' . $POST_TYPE . '/' . $POST_ID . '/';

        $LARGE = $DIR . '/l_' . $FILENAME;
        $MEDIUM = $DIR . '/m_' . $FILENAME;
        $SMALL = $DIR . '/s_' . $FILENAME;

        if( !is_dir( $LARGE ) && file_exists( $LARGE ) )
            unlink( $LARGE );

        if( !is_dir( $MEDIUM ) && file_exists( $MEDIUM ) )
            unlink( $MEDIUM );

        if( !is_dir( $SMALL ) && file_exists( $SMALL ) )
            unlink( $SMALL );
    }


    public static function getPartOfText($text, $limit)
    {
        $length = strlen($text);
        if($length > $limit) {
            $last = strrpos($text,' ',-1*($length - $limit));
            $text = substr($text,0,$last).' ...';
        }
        return $text;
    }

    // public static function getSettings( $id = '' )
    // {

    //     if( $id )
    //     {
    //         if ( Settings::findOne( $id ) )
    //         {
    //             return Settings::findOne( $id )->val;
    //         }

    //         return '';
    //     }

    // }

    public static function getRegionData($parametr)
    {
        $subdomain = (explode('.', $_SERVER['HTTP_HOST']));
        $subdomain = array_shift($subdomain);
        if( $subdomain )
        {
            if ( RegionSettings::findOne([ 'region_id'=>$subdomain ]) )
            {
                return RegionSettings::findOne([ 'region_id'=>$subdomain ])->$parametr;
            }

            return '';
        }

    }

    public static function getImage($model, $type, $attribute){

        if($model->$attribute && file_exists(Yii::getAlias('@frontend') . '/web' . Yii::$app->params['uploads_url'] . $type . '/' . $model->id . '/m_' . $model->$attribute)){
            return Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . $type . '/' . $model->id . '/l_' . $model->$attribute;
        }

        if($type == 'album'){
            if($model->$attribute && file_exists(Yii::getAlias('@frontend') . '/web' . Yii::$app->params['uploads_url'] . $type . '/' . $model->album . '/m_' . $model->$attribute)){
                return Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . $type . '/' . $model->album . '/l_' . $model->$attribute;
            }
        }

        if($type == 'specialist'){
            if($model->$attribute && file_exists(Yii::getAlias('@frontend') . '/web' . Yii::$app->params['uploads_url'] . $type . '/' . $model->id . '/m_' . $model->$attribute)){
                return Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . $type . '/' . $model->id . '/l_' . $model->$attribute;
            }
        }

//        if($type == 'product'){
//            if($model->$attribute && file_exists(Yii::getAlias('@frontend') . '/web' . Yii::$app->params['uploads_url'] . $type . '/' . $model->id . '/m_' . $model->$attribute)){
//                return Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . $type . '/' . $model->id . '/l_' . $model->$attribute;
//            }
//        }

        if($type == 'page'){
            return false;
        }
        return  Yii::$app->params['frontend'] . '/images/default/m_post.jpg';
    }

    public static function getFile($model, $type, $attribute){

        if($model->$attribute && file_exists(Yii::getAlias('@frontend') . '/web' . Yii::$app->params['uploads_url'] . $type . '/' . $model->id . '/' . $model->$attribute)){
            return Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . $type . '/' . $model->id . '/' . $model->$attribute;
        }

        return false;
    }

    public static function getFileFormat($filename){
        return explode('.',$filename)[1];
    }


    public static function getChildCategory($id){

        return NewsCategory::find()->where(['status'=>1,'parent'=>$id])->all();

    }

    public static function active($id){
        if($id == Yii::$app->request->get('id')){
            $answer = 'active';
        }else{
            $categories = NewsCategory::find()->where(['status'=>1,'parent'=>$id])->all();
            foreach ($categories as $category){
                if ($category->id == Yii::$app->request->get('id')){

                    $answer = 'active';
                }
            }
        }

        return $answer;
    }

    public static function getCartCount(){
        if(Yii::$app->user->isGuest)
            return 0;
        
        $user_id = Yii::$app->user->identity->id;
        $models = Cart::find()->where(['client_id'=>$user_id])->all();
        $count = 0;
        foreach ($models as $model){
            $count += $model->qty;
        }
        return $count;
    }

    public static function getWishlistCount(){
        if(Yii::$app->user->isGuest)
            return 0;
        
        $user_id = Yii::$app->user->identity->id;
        $count = Wishlist::find()->where(['client_id'=>$user_id])->count();
        return $count;
    }
}