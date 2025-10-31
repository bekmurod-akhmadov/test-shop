<?php

namespace common\models;

use common\components\StaticFunctions;
use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property int $category_id
 * @property float $price
 * @property float|null $discount_price
 * @property string|null $image
 * @property int|null $in_stock
 * @property string|null $description
 * @property string|null $body
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $status
 * @property int|null $accessory
 *
 * @property ProductCategory $category
 * @property ProductChar[] $productChars
 * @property ProductImage[] $productImages
 */
class Product extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 2;

    const ACCESSORY_ACTIVE = 1;
    const ACCESSORY_INACTIVE = 0;

    public $gallery = [];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['discount_price', 'image', 'description', 'body', 'accessory'], 'default', 'value' => null],
            [['status'], 'default', 'value' => 1],
            [['name', 'category_id', 'price'], 'required'],
            [['category_id', 'in_stock', 'status', 'accessory'], 'integer'],
            [['price', 'discount_price'], 'number'],
            [['description', 'body'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'image'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductCategory::class, 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'category_id' => 'Category ID',
            'price' => 'Price',
            'discount_price' => 'Discount Price',
            'image' => 'Image',
            'in_stock' => 'In Stock',
            'description' => 'Description',
            'body' => 'Body',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
            'accessory' => 'Accessory',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(ProductCategory::class, ['id' => 'category_id']);
    }

    /**
     * Gets query for [[ProductChars]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductChars()
    {
        return $this->hasMany(ProductChar::class, ['product_id' => 'id']);
    }

    /**
     * Gets query for [[ProductImages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductImages()
    {
        return $this->hasMany(ProductImage::class, ['product_id' => 'id']);
    }

    public function getImageFile()
    {
        return StaticFunctions::getImage($this, 'product', 'image');
    }

    public function isWishlist()
    {
        if(Yii::$app->user->isGuest) 
            return false;
        
        return Wishlist::find()->where(['product_id' => $this->id, 'client_id' => Yii::$app->user->identity->id])->exists();
    }

    public function actualPrice(){
        return !empty($this->discount_price) ? $this->discount_price : $this->price;
    }

}
