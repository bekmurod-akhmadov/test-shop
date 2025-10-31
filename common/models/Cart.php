<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cart".
 *
 * @property int $id
 * @property int|null $product_id
 * @property int|null $client_id
 * @property int|null $qty
 *
 * @property Client $client
 * @property Product $product
 */
class Cart extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cart';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'client_id', 'qty'], 'default', 'value' => null],
            [['product_id', 'client_id', 'qty'], 'integer'],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => Client::class, 'targetAttribute' => ['client_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::class, 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'client_id' => 'Client ID',
            'qty' => 'Qty',
        ];
    }

    /**
     * Gets query for [[Client]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Client::class, ['id' => 'client_id']);
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::class, ['id' => 'product_id']);
    }

    public function addToCart($product,$qty){
        $client_id = Yii::$app->user->identity->id;
        $cart = self::findOne(['product_id'=>$product->id,'client_id'=>$client_id]);
        if($cart){
            $cart->qty += $qty;
            if($cart->qty <= 0){
                $cart->delete();
            }else{
                $cart->save();
            }
        }else{
            $cart = new Cart();
            $cart->product_id = $product->id;
            $cart->qty = $qty;
            $cart->client_id = $client_id;
            $cart->save();
        }
        return $cart;
    }

}
