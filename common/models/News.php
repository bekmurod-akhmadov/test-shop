<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property int $category_id
 * @property string $title
 * @property string|null $description
 * @property string|null $body
 * @property string|null $image
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $status
 *
 * @property NewsCategory $category
 */
class News extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 2;

    public $imageFile;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description', 'body', 'image'], 'default', 'value' => null],
            [['status'], 'default', 'value' => self::STATUS_ACTIVE],
            [['category_id', 'title'], 'required'],
            [['category_id', 'status'], 'integer'],
            [['description', 'body'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['title'], 'string', 'max' => 255],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg, gif'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => NewsCategory::class, 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'title' => 'Title',
            'description' => 'Description',
            'body' => 'Body',
            'image' => 'Image',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(NewsCategory::class, ['id' => 'category_id']);
    }

    public static function getCategories()
    {
        return ArrayHelper::map(NewsCategory::find()->where(['status' => NewsCategory::STATUS_ACTIVE])->all(), 'id', 'name');
    }


}
