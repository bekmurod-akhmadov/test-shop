<?php
namespace frontend\controllers;

use yii\web\Controller;
use common\models\Product;
use common\models\Cart;
use yii\web\Response;
use common\models\Wishlist;
use Yii;

class CartController extends Controller
{
    public function actionIndex(){
        $models = Cart::find()->where(['client_id'=>Yii::$app->user->identity->id])->all();
        return $this->render('index',['models' => $models]);
    }

    public function actionAdd($id, $qty = 1){
        Yii::$app->response->format = Response::FORMAT_JSON;
        $product = Product::findOne($id);
        $qty = (int)$qty;
        if (empty($product))
            return [
                'status' => false,
                'message'=>'Tovar topilmadi'
            ];
        
        
        $cart = new Cart();
        $cart->addToCart($product,$qty);

        $models = Cart::find()->where(['client_id'=>Yii::$app->user->identity->id])->all();
        return [
            'status' => true,
            'result'=>$this->renderPartial('cart-modal',['models' => $models]),
            'message' => 'Tovar savatchaga qo`shildi',
        ];
        
    }

    public function actionShow(){
        Yii::$app->response->format = Response::FORMAT_JSON;
        $models = Cart::find()->where(['client_id'=>Yii::$app->user->identity->id])->all();
        return [
            'status' => true,
            'result'=>$this->renderPartial('cart-modal',['models' => $models]),
            
        ];
    }

    public function actionCount(){
        Yii::$app->response->format = Response::FORMAT_JSON;
        $models = Cart::find()->where(['client_id'=>Yii::$app->user->identity->id])->all();
        $count = 0;
        foreach ($models as $model){
            $count += $model->qty;
        }
        return [
            'status' => true,
            'result'=>$count,
        ];
    }

    public function actionRemove($id){
        Yii::$app->response->format = Response::FORMAT_JSON;
        $client_id  = Yii::$app->user->identity->id;
        $cart = Cart::find()->where(['client_id'=>$client_id,'product_id'=>$id])->one();
        if(!$cart){
            return [
                'status' => false,
                'message'=>'Tovar topilmadi'
            ];
        }
        $cart->delete();
        $models = Cart::find()->where(['client_id'=>$client_id])->all();
        return [
            'status' => true,
            'result'=>$this->renderPartial('cart-modal',['models' => $models]),
            'message' => 'Tovar savatchadan o`chirildi',
        ];
    }

    public function actionRemoveCart($id){
        $client_id = Yii::$app->user->identity->id;
        $cart = Cart::find()->where(['client_id'=>$client_id,'product_id'=>$id])->one();
        if(!$cart){
            throw new \Exception('Tovar topilmadi');
        }
        $cart->delete();
        return $this->redirect(['index']);
    }

    public function actionAddToCart($id,$qty = 1){
        $client_id = Yii::$app->user->identity->id;
        $cart = Cart::find()->where(['client_id'=>$client_id,'product_id'=>$id])->one();
        if(!$cart){
            throw new \Exception('Tovar topilmadi');
        }
        $cart->qty += $qty;
        if($cart->qty == 0){
            $cart->delete();
        }else{
            $cart->save();
        }
        return $this->redirect(['index']);
    }

    public function actionAddToWishlist($id){
        Yii::$app->response->format = Response::FORMAT_JSON;
        $product = Product::findOne($id);
        if(!$product){
            return [
                'status' => false,
                'message'=>'Tovar topilmadi'
            ];
        }
        $client_id = Yii::$app->user->identity->id;
        $wishlist = Wishlist::find()->where(['client_id'=>$client_id,'product_id'=>$id])->one();
        if($wishlist){
           $wishlist->delete();
           return [
                'status' => true,
                'message' => 'Tovar sevimlilardan o`chirildi',
            ];
        }else{
            $wishlist = new Wishlist();
            $wishlist->product_id = $product->id;
            $wishlist->client_id = $client_id;
            $wishlist->save();
            if($wishlist->save()){
                return [
                    'status' => true,
                    'message' => 'Tovar sevimlilarga qo`shildi',
                ];
            }

            return [
                'status' => false,
                'message' => 'Tovar sevimlilarga qo`shilmadi',
            ];
        }
    }

    public function actionWishlistCount(){
        Yii::$app->response->format = Response::FORMAT_JSON;
        $client_id = Yii::$app->user->identity->id;
        $wishlist = Wishlist::find()->where(['client_id'=>$client_id])->all();
        return [
            'status' => true,
            'result'=>count($wishlist),
        ];
    }

    public function actionWishlist(){
        $models = Wishlist::find()->where(['client_id'=>Yii::$app->user->identity->id])->all();
        return $this->render('wishlist',['models' => $models]);
    }

    public function actionWishlistRemove($id){
        $client_id = Yii::$app->user->identity->id;
        $wishlist = Wishlist::find()->where(['client_id'=>$client_id,'product_id'=>$id])->one();
        if(!$wishlist){
            throw new \Exception('Tovar topilmadi');
        }
        $wishlist->delete();
        return $this->redirect(['wishlist']);
    }
}