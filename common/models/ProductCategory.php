<?php

namespace common\models;

use Yii;
use common\components\StaticFunctions;
/**
 * This is the model class for table "product_category".
 *
 * @property int $id
 * @property string $name
 * @property int $status
 * @property string $image
 * @property int $parent_id
 *
 * @property Product[] $products
 */
class ProductCategory extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 2;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'status'], 'required'],
            [['status','parent_id'], 'integer'],
            [['name','image'], 'string', 'max' => 255],
            [['name'], 'unique'],
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
            'status' => 'Status',
            'image' => 'Image',
            'parent_id' => 'Parent ID',
        ];
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::class, ['category_id' => 'id']);
    }

    public function getParent()
    {
        return $this->hasOne(self::class, ['id' => 'parent_id']);
    }

    public function getImageFile()
    {
        return StaticFunctions::getImage($this, 'product-category', 'image');
    }

    public function getProductsCount()
    {
        return $this->getProducts()->count();
    }
}
