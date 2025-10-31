<?php
namespace frontend\controllers;

use common\models\Product;
use common\models\Cart;
use yii\web\Response;
use common\models\Wishlist;
use Yii;
use yii\web\Controller;
use common\models\Address;
use common\models\Order;
use common\models\OrderItem;
use common\components\TelegramNotificator;

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

    public function actionCheckout(){
        $client = Yii::$app->user->identity;
        $adresses = Address::find()->where(['client_id'=>$client->id])->all();
        $cart = Cart::find()->where(['client_id'=>$client->id])->all();
        if(!$cart){
            Yii::$app->session->setFlash('error', 'Savatcha bo`sh');
            return $this->redirect(['checkout']);
        }

        if(Yii::$app->request->post()){
            $address_id = Yii::$app->request->post()['Client']['address_id'];
            $address = Address::findOne($address_id);
            if(!$address){
                Yii::$app->session->setFlash('error', 'Manzil topilmadi');
                return $this->redirect(['checkout']);
            }
            $transaction = Yii::$app->db->beginTransaction();
            try{
                $cartObject = new Cart();
                
                $order = new Order();
                $order->client_id = $client->id;
                $order->address = $address->city.', '.$address->district.', '.$address->address;
                $order->created_at = date('Y-m-d H:i:s');
                $order->total_count = $cartObject->getTotalCount();
                $order->total_price = $cartObject->getTotalPrice();
                $order->save();


                foreach($cart as $item){
                    
                    $orderItem = new OrderItem();
                    $orderItem->order_id = $order->id;
                    $orderItem->product_id = $item->product_id;
                    $orderItem->qty = $item->qty;
                    $orderItem->price = $item->product->actualPrice();
                    $orderItem->save();
                }
                
                Cart::deleteAll(['client_id' => $client->id]);

                $telegramNotificator = new TelegramNotificator();
                $telegramNotificator->sendOrderNotification($order);

                $transaction->commit();
                Yii::$app->session->setFlash('success', 'Buyurtma qo`shildi');
                return $this->redirect(['thanks']);
            }catch(\Exception $e){
                $transaction->rollBack();
                Yii::$app->session->setFlash('error', 'Buyurtma qo`shilmadi');
                return $this->redirect(['checkout']);
            }
            
        }

        return $this->render('checkout',[
            'client' => $client,
            'adresses'=>$adresses,
            'carts'=>$cart
        ]);
    }

    public function actionThanks(){
        return $this->render('thanks');
    }
}